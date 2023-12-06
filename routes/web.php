<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('admin.dashboard');
});


Route::group(['as' => 'admin.', 'prefix' => 'admin'], function () {
    Route::middleware(['admin'])->group(function () {
        Route::controller(DashboardController::class)->group(function () {
            Route::get('dashboard', 'index')->name('dashboard.index');
        });

        Route::controller(AuthController::class)->group(function () {
            Route::name('auth.')->group(function () {
                Route::post('logout', 'logout')->name('logout');
                Route::get('update-password', 'updatePassword')->name('updatePassword');
                Route::post('post-update-password', 'postUpdatePassword')->name('postUpdatePassword');
                Route::get('profile', 'profile')->name('profile');
                Route::post('update-profile', 'updateProfile')->name('updateProfile');
            });
        });

        Route::resource('pages', PageController::class);
        Route::resource('categories', CategoryController::class);

        // Route::controller(AuthController::class)->group(function () {
        //     Route::name('pages.')->group(function () {
        //     });
        // });
    });

    Route::controller(AuthController::class)->group(function () {
        Route::name('auth.')->group(function () {
            Route::match(['get', 'post'], 'login', 'login')->name('login');
        });
    });
});
