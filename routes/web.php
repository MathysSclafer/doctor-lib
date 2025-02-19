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
Route::get('/manageAppointment', [ManageAppointmentController::class, 'index'])->name('manage.index');
Route::get('/manageAppointment/delete/appointment{schedule}', [ManageAppointmentController::class, 'delete'])->name('manage.delete');
Route::get('/manageAppointment/update/appointment{schedule}', [ManageAppointmentController::class, 'update'])->name('manage.update');
Route::post('/', [\App\Http\Controllers\AppointmentController::class, 'create'])->name('appointment.create');

Route::get('/schedule', [App\Http\Controllers\ScheduleController::class, 'index'])->name('schedule.index');

Route::post('/home', [App\Http\Controllers\ScheduleController::class, 'store'])->name('schedule.store');

Route::post('/', [\App\Http\Controllers\AppointmentController::class, 'store'])->name('appointment.store');

Route::post('/schedule/{schedule}/modify', [\App\Http\Controllers\ScheduleController::class, 'update'])->name('schedule.update');

Route::delete('/schedule/{schedule}/delete', [\App\Http\Controllers\ScheduleController::class, 'delete'])->name('schedule.delete');

Route::get('/doctor/{id?}', [App\Http\Controllers\ScheduleController::class, 'index'])->name('schedule');

Route::get('/search/{search?}', [App\Http\Controllers\ScheduleController::class, 'search'])->name('search');

Route::get('/schedule/{schedule}/modify', [App\Http\Controllers\ScheduleController::class, 'indexModify'])->name('schedule.modify');



Route::get('/appointment', [App\Http\Controllers\newAppointment::class, 'getpage'])->name('appointment');
Route::get('/appointmentOther', [App\Http\Controllers\newAppointment::class, 'otherAppointment'])->name('appointmentForOther');

Route::post('/appointment', [App\Http\Controllers\newAppointment::class, 'store'])->name('newAppointment');
