<?php

use App\Http\Controllers\EndUser\AuthController;
use App\Http\Controllers\EndUser\ContactController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EndUser\HomeController;
use App\Http\Controllers\EndUser\RegisterController;
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
                'controller' => HomeController::class,
                'as' => 'endUser.',
                'middleware' => 'auth'
            ],
            function () {
                Route::get('', 'index')->name('index');
                Route::get('about', 'showAbout')->name('showAbout');
                Route::get('serviceDetails/{service}', 'serviceDetails')->name('serviceDetails');
                Route::get('blogDetails/{blog}', 'blogDetails')->name('blogDetails');
                Route::get('portfolioDetails/{portfolio}', 'portfolioDetails')->name('portfolioDetails');
                Route::get('portfolios', 'showPortfolio')->name('showPortfolio');
                Route::post('createComment/{blog}', 'createComment')->name('comment.store');

                Route::group(
                    [
                        'as' => 'contact.',
                        'prefix' => 'contacts',
                        'controller'=>ContactController::class
                    ],
                    function () {
                        Route::get('create','create')->name('create');
                        Route::post('store','store')->name('store');
                    }
                );
            }
        );
        Route::get('register', [RegisterController::class, 'registerForm'])->name('registerForm')->middleware('guest');
        Route::post('register', [RegisterController::class, 'register'])->name('register')->middleware('guest');

        Route::get('login', [AuthController::class, 'loginForm'])->name('loginForm');
        Route::post('login', [AuthController::class, 'login'])->name('login');
        Route::get('logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
    }
);
