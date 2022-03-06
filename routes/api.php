<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimalController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();


Route::controller(AnimalController::class)->group(function () {
    Route::group(['prefix' => 'animal'], function () {
        Route::get('/', 'index');
        Route::get('/{id}', 'show');
        Route::post('/{id}', 'store');
        Route::post('/update/{id}', 'update');
        Route::post('/delete/{id}', 'delete');
    });
});
