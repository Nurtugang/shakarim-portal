<?php

namespace App\Policies;

use App\Enums\RolesEnum;
use App\Models\User;

class AnnouncementPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->hasRole([RolesEnum::ADMIN, RolesEnum::PRESS]);
    }
}
