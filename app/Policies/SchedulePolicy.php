<?php

namespace App\Policies;

use App\Models\Schedule;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class SchedulePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Schedule $schedule): bool
    {
        return $user->id === $schedule->doctor_id || $user->id === $schedule->patient_id;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->role === 'doctor';
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Schedule $schedule): bool
    {
        return $user->id === $schedule->doctor_id
            ? Response::allow()
            : Response::deny('Vous ne pouvez pas faire ca!');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Schedule $schedule): bool
    {
        return $user->id === $schedule->doctor_id
            ? Response::allow()
            : Response::deny('Vous ne pouvez supprimer que vos propres horaires.');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Schedule $schedule): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Schedule $schedule): bool
    {
        return false;
    }
}
