<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
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
    return view('welcome');
});

Route::middleware(['guest'])->controller(AuthController::class)->group(function () {
    Route::get('/auth/login', 'index')->name('login');
    Route::post('/auth/login', 'login')->name('login');
});

Route::get('/admin', function () {
    return redirect()->route('dashboard');
});

Route::prefix('admin')->middleware(['auth'])->group(function () {

    // Logout
    Route::controller(AuthController::class)->group(function () {
        Route::get('/logout', 'logout')->name('logout');
    });

    // Dashboard
    Route::controller(DashboardController::class)->group(function () {
        Route::get('/dashboard', 'index')->name('dashboard');
    });

    // Users
    Route::controller(UserController::class)->group(function () {
        Route::get('/users', 'index')->name('users');
        Route::post('/users', 'store')->name('users');
        Route::get('/users/{id}/edit', 'edit');
        Route::put('/users/{id}/edit', 'update');
    });

    // Category
    Route::controller(CategoryController::class)->group(function () {
        Route::get('/category', 'index')->name('category');
        Route::get('/category/create', 'create')->name('categoryCreate');
        Route::post('/category', 'store')->name('category');
        Route::get('/category/{id}/edit', 'edit');
        Route::put('/category/{id}/edit', 'update');
        Route::delete('/category', 'destroy')->name('category');
        Route::get('/category/{id}/detail', 'show')->name('detail');
    });

    // Card
    Route::controller(CardController::class)->group(function () {
        Route::get('/card', 'index')->name('card');
        Route::get('/card/create', 'create')->name('cardCreate');
        Route::post('/card', 'store')->name('card');
        Route::get('/card/{id}/edit', 'edit');
        Route::put('/card/{id}/edit', 'update');
        Route::delete('/card', 'destroy')->name('card');
        Route::get('/card/{id}/detail', 'show')->name('detail');
    });

    
});
