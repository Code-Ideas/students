<?php

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
/* ====== Sign =======*/
Route::post('login', 'AuthController@login')->name('login');
Route::post('register', 'AuthController@register')->name('register');
/*====== Sliders =======*/
Route::get('sliders', 'SliderController');
/*====== Services =======*/
Route::get('services', 'ServiceController')->name('services.index');
/* ====== Posts =======*/
Route::apiResource('posts', 'PostsController', ['only' => ['index', 'show']]);
/*====== Contact =======*/
Route::post('contact', 'ContactController');
Route::get('medical_departments','MedicalController@show');


Route::middleware('auth:api')->group(function () {
    // Logout
    Route::post('logout', 'AuthController@logout');
    Route::post('/medical_reservations/{department_id}','MedicalController@__invoke');

});
