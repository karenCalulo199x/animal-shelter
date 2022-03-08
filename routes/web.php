<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SampleCotroller;
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
    return redirect('home');
});


Route::get('home', [HomeController::class, 'home'])->name('dashboard');

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
