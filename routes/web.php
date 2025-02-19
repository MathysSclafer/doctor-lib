<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('/');

Auth::routes();

Route::post('/', [\App\Http\Controllers\AppointmentController::class, 'create'])->name('appointment.create');
Route::get('/schedule', [App\Http\Controllers\ScheduleController::class, 'index'])->name('schedule.index');

Route::post('/home', [App\Http\Controllers\ScheduleController::class, 'store'])->name('schedule.store');

Route::post('/', [\App\Http\Controllers\AppointmentController::class, 'store'])->name('appointment.store');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/schedule/{id?}', [App\Http\Controllers\ScheduleController::class, 'index'])->name('schedule');


Route::get('/appointment', [App\Http\Controllers\newAppointment::class, 'getpage'])->name('appointment');
Route::get('/appointmentOther', [App\Http\Controllers\newAppointment::class, 'otherAppointment'])->name('appointmentForOther');

Route::post('/appointmentCreated', [App\Http\Controllers\newAppointment::class, 'store'])->name('newAppointment');
