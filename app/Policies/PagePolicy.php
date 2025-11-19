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
        // Разрешаем видеть список, если у пользователя есть хоть какие-то права на страницы
        return $user->hasAnyRole([RolesEnum::ADMIN, RolesEnum::PRESS, RolesEnum::STRUCTURE, RolesEnum::USER]);
    }

    public function view(?User $user, Page $page): bool
    {
        // Если страница публичная (нет привязанных пользователей), доступ есть у всех.
        if ($page->users->isEmpty()) {
            return true;
        }

        // Если страница приватная, а пользователь - гость, то доступа нет.
        if (is_null($user)) {
            return false;
        }

        // Пользователь "Структуры" может видеть страницы своего подразделения.
        if ($user->hasRole(RolesEnum::STRUCTURE) && optional($page->menu)->structure_id === $user->structure_id) {
            return true;
        }

        // Проверяем, есть ли пользователь в списке разрешенных для этой страницы.
        return $page->users->contains($user->id);
    }

    public function create(User $user): bool
    {
        return $user->hasRole([RolesEnum::ADMIN, RolesEnum::PRESS, RolesEnum::STRUCTURE]);
    }

    public function update(User $user, Page $page): bool
    {
        // Пользователь "Структуры" может редактировать страницы своего подразделения.
        if ($user->hasRole(RolesEnum::STRUCTURE) && optional($page->menu)->structure_id === $user->structure_id) {
            return true;
        }
        
        // Пользователь, привязанный напрямую, также может редактировать.
        return $page->users->contains($user->id);
    }

    public function delete(User $user, Page $page): bool
    {
        // Удалять может только "Структура" для своих страниц (или админ через before).
        if ($user->hasRole(RolesEnum::STRUCTURE) && optional($page->menu)->structure_id === $user->structure_id) {
            return true;
        }
        return false;
    }
}