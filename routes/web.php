<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FacebookController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\InstagramController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\MemberController;
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

Route::get('/', [LandingController::class, 'index'])->name('home');
Route::get('/logout', [LandingController::class, 'logout'])->name('signOut');
Route::get('/login', [LandingController::class, 'login'])->name('signIn');
Route::post('/login', [LandingController::class, 'postLogin'])->name('signIn');
Route::get('/register', [LandingController::class, 'register'])->name('reg');
Route::post('/register', [LandingController::class, 'createMember'])->name('reg');

Route::get('/theme', [LandingController::class, 'category'])->name('theme.category');
Route::get('/template/{id}', [LandingController::class, 'template'])->name('theme.template');
Route::get('/editor/{id}', [LandingController::class, 'editor'])->name('theme.editor');
Route::get('/share/{id}', [LandingController::class, 'share'])->name('theme.share');

Route::middleware(['guest'])->controller(AuthController::class)->group(function () {
    Route::get('/auth/login', 'index')->name('login');
    Route::post('/auth/login', 'login')->name('login');
});

// OAUTH
Route::get('/auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.login');
Route::get('/auth/google/callback', [GoogleController::class, 'handleCallbackGoogle'])->name('google.callback');

Route::get('/auth/facebook', [FacebookController::class, 'redirectToFacebook'])->name('facebook.login');
Route::get('/auth/facebook/callback', [FacebookController::class, 'handleCallbackFacebook'])->name('facebook.callback');

Route::get('/auth/instagram', [InstagramController::class, 'redirectToInstagram'])->name('instagram.login');
Route::get('/auth/instagram/callback', [InstagramController::class, 'handleCallbackInstagram'])->name('instagram.callback');

// Route::middleware('auth:members')->controller(LandingController::class)->group(function () {
//     Route::get('/theme', 'category')->name('theme.category');
// });

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

    // Member
    Route::controller(MemberController::class)->group(function () {
        Route::get('/member', 'index')->name('member');
        Route::get('/member/create', 'create')->name('memberCreate');
        Route::post('/member', 'store')->name('member');
        Route::get('/member/{id}/edit', 'edit');
        Route::put('/member/{id}/edit', 'update');
        Route::delete('/member', 'destroy')->name('member');
        Route::get('/member/{id}/detail', 'show')->name('detail');
    });
});
