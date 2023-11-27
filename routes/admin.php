<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\Admin\HomeSlideController;
use App\Http\Controllers\Admin\PortfolioController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {
        Route::group(
            [
                'as' => 'admin.',
                'middleware' => 'checkAdmin',
                'prefix' => 'admin'
            ],
            function () {
                Route::get('', [HomeController::class, 'index'])->name('index');
                Route::get('users', [HomeController::class, 'showUsers'])->name('showUsers');
                Route::get('profile', [HomeController::class, 'profile'])->name('profile');
                Route::get('profile/edit', [HomeController::class, 'editProfile'])->name('profile.edit');
                Route::put('profile/update/{user}', [HomeController::class, 'updateProfile'])->name('profile.update');
                Route::get('status/change/{user}', [HomeController::class, 'changeStatus'])->name('changeStatus');

                Route::group(
                    [
                        'as' => 'slide.',
                        'prefix' => 'slides',
                        'controller' => HomeSlideController::class
                    ],
                    function () {
                        Route::get('', 'index')->name('index');
                        Route::get('create', 'create')->name('create');
                        Route::post('store', 'store')->name('store');
                        Route::get('edit/{slide}', 'edit')->name('edit');
                        Route::put('update/{slide}', 'update')->name('update');
                        Route::delete('/{slide}', 'delete')->name('delete');
                    }
                );
                Route::group(
                    [
                        'as' => 'about.',
                        'prefix' => 'abouts',
                        'controller' => AboutController::class
                    ],
                    function () {
                        Route::get('', 'index')->name('index');
                        Route::get('create', 'create')->name('create');
                        Route::post('store', 'store')->name('store');
                        Route::get('edit/{about}', 'edit')->name('edit');
                        Route::put('update/{about}', 'update')->name('update');
                        Route::delete('/{about}', 'delete')->name('delete');
                    }
                );
                Route::group(
                    [
                        'as' => 'image.',
                        'prefix' => 'images',
                        'controller' => ImageController::class
                    ],
                    function () {
                        Route::get('', 'index')->name('index');
                        Route::get('create', 'create')->name('create');
                        Route::post('store', 'store')->name('store');
                        Route::get('edit/{image}', 'edit')->name('edit');
                        Route::put('update/{image}', 'update')->name('update');
                        Route::delete('/{image}', 'delete')->name('delete');
                    }
                );
                Route::group(
                    [
                        'as' => 'portfolio.',
                        'prefix' => 'portfolios',
                        'controller' => PortfolioController::class
                    ],
                    function () {
                        Route::get('', 'index')->name('index');
                        Route::get('create', 'create')->name('create');
                        Route::post('store', 'store')->name('store');
                        Route::get('edit/{portfolio}', 'edit')->name('edit');
                        Route::put('update/{portfolio}', 'update')->name('update');
                        Route::delete('/{portfolio}', 'delete')->name('delete');
                    }
                );
                Route::group(
                    [
                        'as' => 'category.',
                        'prefix' => 'categories',
                        'controller' => CategoryController::class
                    ],
                    function () {
                        Route::get('', 'index')->name('index');
                        Route::get('create', 'create')->name('create');
                        Route::post('store', 'store')->name('store');
                        Route::get('edit/{category}', 'edit')->name('edit');
                        Route::put('update/{category}', 'update')->name('update');
                        Route::delete('/{category}', 'delete')->name('delete');
                    }
                );
                Route::group(
                    [
                        'as' => 'blog.',
                        'prefix' => 'blogs',
                        'controller' => BlogController::class
                    ],
                    function () {
                        Route::get('', 'index')->name('index');
                        Route::get('create', 'create')->name('create');
                        Route::post('store', 'store')->name('store');
                        Route::get('edit/{blog}', 'edit')->name('edit');
                        Route::put('update/{blog}', 'update')->name('update');
                        Route::delete('/{blog}', 'delete')->name('delete');
                    }
                );
            }
        );
        Route::get('/admin/login', [AuthController::class, 'loginForm'])->name('admin.loginForm');
        Route::post('/admin/login', [AuthController::class, 'login'])->name('admin.login');
        Route::post('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');
    }
);
