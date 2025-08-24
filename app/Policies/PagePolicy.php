<?php

namespace App\Policies;

use App\Enums\RolesEnum;
use App\Models\Menu;
use App\Models\Page;
use App\Models\Structure;
use App\Models\User;

class PagePolicy
{
    public function viewAny(User $user): bool
    {
        return $user->hasRole([RolesEnum::ADMIN, RolesEnum::STRUCTURE]);
    }

    public function create(User $user): bool
    {
        return $user->hasRole([RolesEnum::ADMIN, RolesEnum::STRUCTURE]);
    }

    public function update(User $user, Page $page): bool
    {
        if($user->hasRole(RolesEnum::ADMIN)) {
            return true;
        }

        if($user->hasRole(RolesEnum::STRUCTURE) && $page->menu->structure_id === $user->structure_id) {
            return true;
        }
        return false;
    }

    public function view(User $user, Page $page): bool
    {
        if($user->hasRole(RolesEnum::ADMIN)) {
            return true;
        }

        if($user->hasRole(RolesEnum::STRUCTURE) && $page->menu->structure_id === $user->structure_id) {
            return true;
        }
        return false;
    }

    public function delete(User $user, Page $page): bool
    {
        if($user->hasRole(RolesEnum::ADMIN)) {
            return true;
        }

        if($user->hasRole(RolesEnum::STRUCTURE) && $page->menu->structure_id === $user->structure_id) {
            return true;
        }
        return false;
    }
}
