<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('/');

Auth::routes();

Route::post('/', [\App\Http\Controllers\AppointmentController::class, 'create'])->name('appointment.create');
Route::get('/schedule', [App\Http\Controllers\ScheduleController::class, 'index'])->name('schedule.index');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/appointment', [App\Http\Controllers\newAppointment::class, 'getpage'])->name('appointment');
