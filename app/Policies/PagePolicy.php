<?php

namespace App\Policies;

use App\Enums\RolesEnum;
use App\Models\Page;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PagePolicy
{
    use HandlesAuthorization;

    public function before(User $user, string $ability): ?bool
    {
        return $user->hasRole(RolesEnum::ADMIN) ? true : null;
    }

    public function viewAny(User $user): bool
    {
        return $user->hasAnyRole([RolesEnum::ADMIN, RolesEnum::PRESS, RolesEnum::STRUCTURE, RolesEnum::USER, RolesEnum::SCIENCE, RolesEnum::CAMPUS_LIFE, RolesEnum::DEVELOPMENT]);
    }

    public function view(?User $user, Page $page): bool
    {
        if ($page->users->isEmpty()) {
            return true;
        }
        if (is_null($user)) {
            return false;
        }
        if ($user->hasRole(RolesEnum::STRUCTURE) && optional($page->menu)->structure_id === $user->structure_id) {
            return true;
        }
        return $page->users->contains($user->id);
    }

    public function create(User $user): bool
    {
        return $user->hasRole([RolesEnum::ADMIN, RolesEnum::PRESS, RolesEnum::STRUCTURE]);
    }

    public function update(User $user, Page $page): bool
    {
        // Разрешаем редактировать, если выполняется ХОТЯ БЫ ОДНО из условий:

        // 1. Пользователь "Структуры" и страница его подразделения
        if ($user->hasRole(RolesEnum::STRUCTURE) && optional($page->menu)->structure_id === $user->structure_id) {
            return true;
        }
        
        // 2. Пользователь напрямую привязан к этой странице
        if ($page->users->contains($user->id)) {
            return true;
        }

        return false;
    }

    public function delete(User $user, Page $page): bool
    {
        if ($user->hasRole(RolesEnum::STRUCTURE) && optional($page->menu)->structure_id === $user->structure_id) {
            return true;
        }
        return false;
    }
}