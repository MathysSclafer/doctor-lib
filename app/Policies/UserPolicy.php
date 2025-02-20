<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

class UserPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewDoctor(User $user, User $doctor): bool
    {
        return $doctor->role === 'medecin';
    }

    public function viewAdmin(User $user): bool{

        return $user->role === 'medecin';
    }
}
