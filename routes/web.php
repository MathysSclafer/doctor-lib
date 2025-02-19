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

Route::post('/schedule/{schedule}/modify', [\App\Http\Controllers\ScheduleController::class, 'update'])->name('schedule.update');

Route::delete('/schedule/{schedule}/delete', [\App\Http\Controllers\ScheduleController::class, 'delete'])->name('schedule.delete');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/doctor/{id?}', [App\Http\Controllers\ScheduleController::class, 'index'])->name('schedule');

Route::get('/search/{search?}', [App\Http\Controllers\ScheduleController::class, 'search'])->name('search');

Route::get('/schedule/{schedule}/modify', [App\Http\Controllers\ScheduleController::class, 'indexModify'])->name('schedule.modify');



Route::get('/appointment', [App\Http\Controllers\newAppointment::class, 'getpage'])->name('appointment');
Route::get('/appointmentOther', [App\Http\Controllers\newAppointment::class, 'otherAppointment'])->name('appointmentForOther');

Route::post('/appointment', [App\Http\Controllers\newAppointment::class, 'store'])->name('newAppointment');


Route::get('/profil', [App\Http\Controllers\account::class, 'index'])->name('profileSection');
Route::post('/change_name', [App\Http\Controllers\account::class, 'name'])->name('change_name');
Route::post('/change_first_name', [App\Http\Controllers\account::class, 'first_name'])->name('change_first_name');
Route::post('/change_age', [App\Http\Controllers\account::class, 'age'])->name('change_age');
Route::post('/change_email', [App\Http\Controllers\account::class, 'email'])->name('change_email');
Route::post('/become_medecin', [App\Http\Controllers\account::class, 'medecin'])->name('devMed');
Route::post('/become_client', [App\Http\Controllers\account::class, 'client'])->name('devCli');
