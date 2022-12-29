<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ProfilesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::controller(AuthController::class)->prefix('auth')->group(function () {
    Route::post('/login', 'login')->name('auth.login');
    Route::post('/register', 'register')->name('auth.register');
    Route::get('/user', 'user')->name('auth.user')->middleware(['auth:sanctum']);
});
Route::prefix('users')->group(function () {
    Route::prefix('profiles')->controller(ProfilesController::class)->group(function () {
        Route::get('/{profile}', 'index');
    });
});
Route::middleware('auth:sanctum')->group(function () {
    Route::prefix('users')->group(function () {
        Route::prefix('profiles')->controller(ProfilesController::class)->group(function () {
            Route::patch('/{profile}', 'update');
        });
    });
});
