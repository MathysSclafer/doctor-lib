<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmailController;

Route::get('/', function () {
    return view('welcome');
})->name('/');

Auth::routes();


Route::post('/home', [App\Http\Controllers\ScheduleController::class, 'store'])->name('schedule.store');

Route::post('/', [\App\Http\Controllers\AppointmentController::class, 'store'])->name('appointment.store');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/schedule/{id?}', [App\Http\Controllers\ScheduleController::class, 'index'])->name('schedule');

Route::get('send-mail', [EmailController::class, 'sendWelcomeEmail']);
