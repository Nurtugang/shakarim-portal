<?php

namespace App\Policies;

use App\Enums\RolesEnum;
use App\Models\Graduate;
use App\Models\User;

class GraduatePolicy
{
    /**
     * Determine whether the user can view the list / navigation.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasRole([RolesEnum::ADMIN, 'academics']);
    }

    public function view(User $user, Graduate $graduate): bool
    {
        return $this->viewAny($user);
    }

    public function create(User $user): bool
    {
        return $this->viewAny($user);
    }

    public function update(User $user, Graduate $graduate): bool
    {
        return $this->viewAny($user);
    }

    public function delete(User $user, Graduate $graduate): bool
    {
        return $this->viewAny($user);
    }
}
