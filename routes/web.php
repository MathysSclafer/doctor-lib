<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ManageAppointmentController;
use App\Http\Controllers\ScheduleController;

Route::get('/', function () {
    return view('welcome');
})->name('/');

Auth::routes();

// Appointment
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::post('/', [AppointmentController::class, 'create'])->name('appointment.create');
Route::get('/manageAppointment', [ManageAppointmentController::class, 'index'])->name('manage.index');
Route::get('/manageAppointment/delete/appointment{schedule}', [ManageAppointmentController::class, 'delete'])->name('manage.delete');
Route::get('/manageAppointment/update/appointment{schedule}', [ManageAppointmentController::class, 'update'])->name('manage.update');
