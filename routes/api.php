<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\Admin;
use Illuminate\Support\Facades\Route;

//bárki által elérhető
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::post('/register',[RegisteredUserController::class, 'store']);

//autentikált útvonal
Route::middleware(['auth:sanctum'])
    ->group(function () {

        // Kijelentkezés útvonal
        Route::post('/logout', [AuthenticatedSessionController::class, 'destroy']);
    });

Route::middleware(['auth:sanctum', Admin::class])
    ->group(function () {
        //Route::get('/admin/users', [UserController::class, 'index']);
        Route::apiResource('/admin/users', UserController::class);
    });
