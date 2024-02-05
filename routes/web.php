<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/',[HomeController::class, 'index'])->name('home');

Route::controller(UserController::class)->group(function() {
    Route::get('/users','index')->name('users.index');
    Route::get('/users/create', 'create')->name('users.create');
    Route::post('/users', 'store')->name('users.store');
    Route::post('/users/{id} ', 'show')->name('users.show');
    Route::get('/users/{id}','edit')->name('users.edit');
    Route::put('/user', 'update')->name('users.update');
    Route::delete('/user/destroy', 'destroy')->name('users.destroy');
});