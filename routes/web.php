<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [UserController::class,'index'])->name('users.index');

Route::get('users', [UserController::class,'index'])->name('users.index');
Route::get('create', [UserController::class,'create'])->name('users.create');
Route::get('edit/{id}', [UserController::class,'edit'])->name('users.edit');
