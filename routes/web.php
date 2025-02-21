<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ManageAppointmentController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\account;

Route::get('/', function () {
    $patientsCount = User::all()->where('role', 'patient')->count();
    $medecinsCount = User::all()->where('role', 'medecin')->count();

    return view('welcome', compact('patientsCount', 'medecinsCount'));
})->name('/');


Auth::routes();

// AppointmentController
Route::get('/myprofile', [HomeController::class, 'index'])->name('home');


Route::get('/manage/appointment', [ManageAppointmentController::class, 'index'])->name('manage.index');
Route::get('/manage/appointment{schedule}/finished', [ManageAppointmentController::class, 'finished'])->name('manage.finished');
Route::get('/manage/appointment{schedule}/delete', [ManageAppointmentController::class, 'delete'])->name('manage.delete');
Route::get('/manage/appointment{schedule}/update', [ManageAppointmentController::class, 'update'])->name('manage.update');
Route::put('/manage/appointment/{id}/modified', [ManageAppointmentController::class, 'saveUpdate'])->name('appointment.modified');


Route::post('/', [AppointmentController::class, 'store'])->name('appointment.store');
Route::get('/appointment/{id_doctor?}', [AppointmentController::class, 'getpage'])->name('appointment');
Route::post('/appointment', [AppointmentController::class, 'store'])->name('newappointment');
Route::get('/appointmentOther/{id_doctor?}', [AppointmentController::class, 'otherAppointment'])->name('appointmentForOther');


Route::get('/search/{search?}', [ScheduleController::class, 'search'])->name('search');
Route::get('/doctor/{doctor}', [ScheduleController::class, 'showDoctor'])->name('doctor');
Route::get('/schedule', [ScheduleController::class, 'index'])->name('schedule.index');
Route::match(['get', 'post'],'/home', [ScheduleController::class, 'store'])->name('schedule.store');
Route::post('/schedule/{schedule}/modify', [ScheduleController::class, 'update'])->name('schedule.update');
Route::delete('/schedule/{schedule}/delete', [ScheduleController::class, 'delete'])->name('schedule.delete');
Route::get('/schedule/{schedule}/modify', [ScheduleController::class, 'indexModify'])->name('schedule.modify');


Route::get('/profil', [account::class, 'index'])->name('profileSection');
Route::post('/change_name', [account::class, 'name'])->name('change_name');
Route::post('/change_first_name', [account::class, 'first_name'])->name('change_first_name');
Route::post('/change_age', [account::class, 'age'])->name('change_age');
Route::post('/change_email', [account::class, 'email'])->name('change_email');
Route::post('/change_city', [account::class, 'city'])->name('change_city');
Route::post('/change_area', [account::class, 'area'])->name('change_area');


Route::post('/search', [UserController::class, 'storeNotation'])->name('rating');
Route::get('/admin/{id?}', [UserController::class, 'adminIndex'])->name('admin');


Route::get('/send-mail', [EmailController::class, 'sendWelcomeEmail']);
