<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('/');

Auth::routes();


Route::post('/home', [App\Http\Controllers\ScheduleController::class, 'store'])->name('schedule.store');

Route::post('/', [\App\Http\Controllers\AppointmentController::class, 'store'])->name('appointment.store');

Route::post('/schedule/{schedule}/modify', [\App\Http\Controllers\ScheduleController::class, 'update'])->name('schedule.update');

Route::delete('/schedule/{schedule}/delete', [\App\Http\Controllers\ScheduleController::class, 'delete'])->name('schedule.delete');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/doctor/{id?}', [App\Http\Controllers\ScheduleController::class, 'index'])->name('schedule');

Route::get('/search/{search?}', [App\Http\Controllers\ScheduleController::class, 'search'])->name('search');

Route::get('/schedule/{schedule}/modify', [App\Http\Controllers\ScheduleController::class, 'indexModify'])->name('schedule.index');

