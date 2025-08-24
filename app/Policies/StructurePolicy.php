<?php

namespace App\Policies;

use App\Enums\RolesEnum;
use App\Models\Structure;
use App\Models\User;
use PhpParser\Node\Expr\FuncCall;

class StructurePolicy
{
    public function viewAny(User $user): bool
    {
        return $user->hasRole([RolesEnum::ADMIN, RolesEnum::STRUCTURE]);
    }

    public function create(User $user): bool
    {
        return $user->hasRole([RolesEnum::ADMIN, RolesEnum::STRUCTURE]);
    }

    public function update(User $user, Structure $structure): bool
    {
        if($user->hasRole(RolesEnum::ADMIN)) {
            return true;
        }

        if($user->hasRole(RolesEnum::STRUCTURE) && $structure->id == $user->structure_id) {
            return true;
        }
        return false;
    }

    public function view(User $user, Structure $structure): bool
    {
        if($user->hasRole(RolesEnum::ADMIN)) {
            return true;
        }

        if($user->hasRole(RolesEnum::STRUCTURE) && $structure->id == $user->structure_id) {
            return true;
        }
        return false;
    }

    public function delete(User $user, Structure $structure): bool
    {
        return $user->hasRole(RolesEnum::ADMIN);
    }
}
