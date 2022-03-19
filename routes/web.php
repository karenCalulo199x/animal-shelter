<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdopterController;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RescuerController;
use App\Models\Adopter;

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


Route::get('/', [HomeController::class, 'home'])->name('dashboard');

Route::controller(AnimalController::class)->group(function () {
    Route::group(['prefix' => 'animals'], function () {
        Route::name('animals.')->group(function () {
            Route::get('/', 'index')->name('index');

            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');

            Route::get('/edit/{id}', 'edit')->name('edit');
            Route::post('/update/{id}', 'update')->name('update');

            Route::delete('/delete/{id}', 'destroy')->name('destroy');
            Route::get('/{id}', 'show')->name('show');
        });
    });
});

Route::resource('rescuers', RescuerController::class);

Route::resource('employees', EmployeeController::class);

// Route::resource('donations', DonationController::class);
Route::controller(DonationController::class)->group(function () {
    Route::group(['prefix' => 'donations'], function () {
        Route::name('donations.')->group(function () {

            Route::get('/{type}/create/', 'create')->name('create');
            Route::post('/{type}/store/', 'store')->name('store');
            Route::get('/{type}/edit/{id}', 'edit')->name('edit');
            Route::post('/{type}/update/{id}', 'update')->name('update');
            Route::delete('/{type}/delete/{id}/', 'destroy')->name('destroy');
            Route::get('/{type}', 'index')->name('index');
        });
    });
});

Route::controller(AdopterController::class)->group(function () {
    Route::group(['prefix' => 'adopters'], function () {
        Route::name('adopters.')->group(function () {

            Route::get('/', 'index')->name('index');

            Route::post('/store', 'store')->name('store');

            Route::post('/update/{id}', 'update')->name('update');

            Route::delete('/delete/{id}', 'destroy')->name('destroy');
        });
    });
});
