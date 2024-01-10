<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::name('api.')
	->prefix('v1')
	->middleware('web') // This middleware to use stateful authentication
	->group(function () {

		// Public routes
		Route::post('login', [\App\Http\Controllers\Api\AuthController::class, 'login'])->name('login');
		Route::post('register', [\App\Http\Controllers\Api\AuthController::class, 'register'])->name('register');

		// Protected routes
		Route::middleware('auth:sanctum')->group(function () {
			Route::get('user', [\App\Http\Controllers\Api\AuthController::class, 'user'])->name('user');
			Route::post('logout', [\App\Http\Controllers\Api\AuthController::class, 'logout'])->name('logout');

			Route::apiResource('products', \App\Http\Controllers\Api\ProductController::class);
		});
	});
