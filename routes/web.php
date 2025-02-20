<?php

use Illuminate\Support\Facades\Route;
use \App\Models\User;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ManageAppointmentController;
use App\Http\Controllers\ScheduleController;

Route::get('/', function () {
    $patientsCount = User::all()->where('role', 'patient')->count();
    $medecinsCount = User::all()->where('role', 'medecin')->count();

    return view('welcome', compact('patientsCount', 'medecinsCount'));
})->name('/');


Auth::routes();

// Appointment
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/search/{search?}', [ScheduleController::class, 'search'])->name('search');

Route::post('/', [\App\Http\Controllers\AppointmentController::class, 'store'])->name('appointment.store');

Route::post('/schedule/{schedule}/modify', [\App\Http\Controllers\ScheduleController::class, 'update'])->name('schedule.update');

Route::delete('/schedule/{schedule}/delete', [\App\Http\Controllers\ScheduleController::class, 'delete'])->name('schedule.delete');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/doctor/{id?}', [App\Http\Controllers\ScheduleController::class, 'showDoctor'])->name('doctor');

Route::get('/search/{search?}', [App\Http\Controllers\ScheduleController::class, 'search'])->name('search');

Route::get('/schedule/{schedule}/modify', [App\Http\Controllers\ScheduleController::class, 'indexModify'])->name('schedule.modify');

Route::get('/manage/appointment', [ManageAppointmentController::class, 'index'])->name('manage.index');
Route::get('/manage/appointment{schedule}/delete', [ManageAppointmentController::class, 'delete'])->name('manage.delete');
Route::get('/manage/appointment{schedule}/update', [ManageAppointmentController::class, 'update'])->name('manage.update');
Route::put('/appointment/{id}/modified', [ManageAppointmentController::class, 'saveUpdate'])->name('appointment.modified');

Route::get('/appointment', [App\Http\Controllers\newAppointment::class, 'getpage'])->name('appointment');

Route::get('/appointmentOther', [App\Http\Controllers\newAppointment::class, 'otherAppointment'])->name('appointmentForOther');

Route::post('/appointment', [App\Http\Controllers\newAppointment::class, 'store'])->name('newAppointment');
Route::get('/appointmentOther', [App\Http\Controllers\newAppointment::class, 'otherAppointment'])->name('appointmentForOther');

Route::get('/schedule', [ScheduleController::class, 'index'])->name('schedule.index');
Route::post('/home', [ScheduleController::class, 'store'])->name('schedule.store');
Route::post('/schedule/{schedule}/modify', [ScheduleController::class, 'update'])->name('schedule.update');
Route::delete('/schedule/{schedule}/delete', [ScheduleController::class, 'delete'])->name('schedule.delete');
Route::get('/schedule/{schedule}/modify', [App\Http\Controllers\ScheduleController::class, 'indexModify'])->name('schedule.modify');


Route::get('/profil', [App\Http\Controllers\account::class, 'index'])->name('profileSection');
Route::post('/change_name', [App\Http\Controllers\account::class, 'name'])->name('change_name');
Route::post('/change_first_name', [App\Http\Controllers\account::class, 'first_name'])->name('change_first_name');
Route::post('/change_age', [App\Http\Controllers\account::class, 'age'])->name('change_age');
Route::post('/change_email', [App\Http\Controllers\account::class, 'email'])->name('change_email');

Route::post('/rating', [\App\Http\Controllers\UserController::class, 'storeNotation'])->name('rating');
