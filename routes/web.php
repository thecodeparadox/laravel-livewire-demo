<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/logout', [UserController::class, 'logout'])->name('user.logout');

Route::prefix('user')->group(function () {
    Route::match(['GET', 'POST'], '/login', [UserController::class, 'login'])->name('user.login');
    Route::get('/signup', [UserController::class, 'signup'])->name('user.signup');
    Route::post('/store', [UserController::class, 'store'])->name('user.store');
});

Route::middleware('auth:sanctum')->group(function () {
    Route::prefix('posts')->group(function () {
        Route::get('/', [PostController::class, 'index'])->name('posts.listing');
    });
});
