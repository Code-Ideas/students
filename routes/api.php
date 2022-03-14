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
Route::apiResource('services', 'ServiceController', ['only' => ['index', 'show']]);
/* ====== Posts =======*/
Route::apiResource('posts', 'PostsController', ['only' => ['index', 'show']]);
/*====== Admin Departments =======*/
Route::get('admin_departments','ContactController@index');
/*====== Contacts=======*/
Route::post('contact', 'ContactController');
/*====== Medical Departments =======*/
Route::get('medical_departments', 'MedicalController@index');


Route::middleware('auth:api')->group(function () {
    // Logout
    Route::post('logout', 'AuthController@logout');
    // Medical Reservations
    Route::post('/medical_reservations', 'MedicalController@store');

});
