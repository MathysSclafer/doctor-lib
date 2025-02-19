<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ScheduleController;

Route::get('/', function () {
    return view('welcome');
})->name('/');

Auth::routes();

// Appointment
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::post('/', [AppointmentController::class, 'create'])->name('appointment.create');
Route::get('/schedule', [ScheduleController::class, 'index'])->name('schedule.index');
Route::get('/schedule/delete/appointment{schedule}', [ScheduleController::class, 'delete'])->name('schedule.delete');
Route::get('/schedule/update/appointment{schedule}', [ScheduleController::class, 'update'])->name('schedule.update');
