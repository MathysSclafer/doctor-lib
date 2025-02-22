<?php

namespace App\Providers;

use App\Models\ManageAppointment;
use App\Models\Schedule;
use App\Models\User;
use App\Policies\ManageAppointmentPolicy;
use App\Policies\SchedulePolicy;
use App\Policies\UserPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use App\Models\Appointment;
use App\Policies\appointmentPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {

    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Gate::policy(Schedule::class, SchedulePolicy::class);
        Gate::policy(User::class, UserPolicy::class);
        Gate::policy(ManageAppointment::class, ManageAppointmentPolicy::class);
        Gate::policy(Appointment::class, AppointmentPolicy::class);
    }
}
