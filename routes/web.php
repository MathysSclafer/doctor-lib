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

Route::get('/search/{search?}', [ScheduleController::class, 'search'])->name('search');

Route::get('/manage/appointment', [ManageAppointmentController::class, 'index'])->name('manage.index');
Route::get('/manage/appointment{schedule}/delete', [ManageAppointmentController::class, 'delete'])->name('manage.delete');
Route::get('/manage/appointment{schedule}/update', [ManageAppointmentController::class, 'update'])->name('manage.update');
Route::put('/appointment/{id}/modified', [ManageAppointmentController::class, 'saveUpdate'])->name('appointment.modified');

Route::get('/appointment', [App\Http\Controllers\newAppointment::class, 'getpage'])->name('appointment');
Route::post('/', [AppointmentController::class, 'create'])->name('appointment.create');
Route::post('/', [AppointmentController::class, 'store'])->name('appointment.store');
Route::post('/appointment', [App\Http\Controllers\newAppointment::class, 'store'])->name('newAppointment');
Route::get('/appointmentOther', [App\Http\Controllers\newAppointment::class, 'otherAppointment'])->name('appointmentForOther');

Route::get('/schedule', [ScheduleController::class, 'index'])->name('schedule.index');
Route::post('/home', [ScheduleController::class, 'store'])->name('schedule.store');
Route::post('/schedule/{schedule}/modify', [ScheduleController::class, 'update'])->name('schedule.update');
Route::delete('/schedule/{schedule}/delete', [ScheduleController::class, 'delete'])->name('schedule.delete');
Route::get('/doctor/{id?}', [App\Http\Controllers\ScheduleController::class, 'index'])->name('schedule');
Route::get('/schedule/{schedule}/modify', [App\Http\Controllers\ScheduleController::class, 'indexModify'])->name('schedule.modify');
