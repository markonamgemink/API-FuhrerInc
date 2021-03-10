<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
// 1. Login
Route::post('login', [UserController::class, 'login']);
// 2. Register
Route::post('register', [UserController::class, 'register']);
// 4. User untuk cek identitas yang login
Route::get('user', [UserController::class, 'getAuthenticatedUser'])->middleware('jwt.verify');
//
Route::get('/products', [ProductController::class, 'index']);
//
Route::get('/products/distinct', [ProductController::class, 'distinctAll']);
//
Route::get('/products/{id}', [ProductController::class, 'show']);
//
Route::get('/cart', [CartController::class, 'index'])->middleware('jwt.verify');
//
Route::post('/cart', [CartController::class, 'update'])->middleware('jwt.verify');
//
Route::post('/cart/{id}/delete', [CartController::class, 'delete'])->middleware('jwt.verify');
