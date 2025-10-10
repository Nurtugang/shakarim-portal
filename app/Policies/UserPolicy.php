<?php

namespace App\Policies;

use App\Enums\RolesEnum;
use App\Models\Role;
use App\Models\User;

class UserPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->hasRole(RolesEnum::ADMIN);
    }
}
