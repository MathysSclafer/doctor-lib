<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmailController;
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

// AppointmentController
Route::get('/myprofile', [HomeController::class, 'index'])->name('home');

Route::get('/search/{search?}', [ScheduleController::class, 'search'])->name('search');

Route::post('/schedule/{schedule}/modify', [\App\Http\Controllers\ScheduleController::class, 'update'])->name('schedule.update');
Route::post('/', [AppointmentController::class, 'store'])->name('appointment.store');


Route::post('/schedule/{schedule}/modify', [ScheduleController::class, 'update'])->name('schedule.update');

Route::delete('/schedule/{schedule}/delete', [ScheduleController::class, 'delete'])->name('schedule.delete');


Route::get('/doctor/{doctor}', [App\Http\Controllers\ScheduleController::class, 'showDoctor'])->name('doctor');

Route::get('/schedule/{schedule}/modify', [App\Http\Controllers\ScheduleController::class, 'indexModify'])->name('schedule.modify');

Route::get('/manage/appointment', [ManageAppointmentController::class, 'index'])->name('manage.index');
Route::get('/manage/appointment{schedule}/finished', [ManageAppointmentController::class, 'finished'])->name('manage.finished');
Route::get('/manage/appointment{schedule}/delete', [ManageAppointmentController::class, 'delete'])->name('manage.delete');
Route::get('/manage/appointment{schedule}/update', [ManageAppointmentController::class, 'update'])->name('manage.update');
Route::put('/appointment/{id}/modified', [ManageAppointmentController::class, 'saveUpdate'])->name('appointment.modified');

Route::get('/appointment/{id_doctor?}', [App\Http\Controllers\AppointmentController::class, 'getpage'])->name('appointment');
Route::get('/appointmentOther/{id_doctor?}', [App\Http\Controllers\AppointmentController::class, 'otherAppointment'])->name('appointmentForOther');


Route::post('/appointment', [App\Http\Controllers\AppointmentController::class, 'store'])->name('newappointment');




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
Route::post('/change_city', [App\Http\Controllers\account::class, 'city'])->name('change_city');
Route::post('/change_area', [App\Http\Controllers\account::class, 'area'])->name('change_area');

Route::post('/search', [\App\Http\Controllers\UserController::class, 'storeNotation'])->name('rating');

Route::get('send-mail', [EmailController::class, 'sendWelcomeEmail']);

Route::get('/admin/{id?}', [App\Http\Controllers\UserController::class, 'adminIndex'])->name('admin');
