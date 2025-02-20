<?php

namespace App\Providers;

use App\Models\Schedule;
use App\Policies\SchedulePolicy;
use Illuminate\Support\ServiceProvider;
use App\Models\Appointment;
use App\Policies\appointmentPolicy;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Schedule::class => SchedulePolicy::class,
        Appointment::class => appointmentPolicy::class,
    ];
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
        //
    }
}
