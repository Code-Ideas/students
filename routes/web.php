<?php

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
// Route::view('/welcome', 'welcome')->name('landing');

// Route::view('/', 'admin.landing')->name('admin_landing');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::view('/welcome', 'welcome')->name('landing');


Auth::routes();

Route::get('/', "HomeController@index")->name('home')->middleware('auth');
Route::get('/complain',"WebController@complain")->name('complain');
 Route::get('/storeComplain',"WebController@storeComplain")->name('storeComplain');
 Route::get('/clinic',"WebController@clinic")->name('clinic');
 Route::get('/storeClinic','WebController@storeClinic')->name('storeClinic');
 Route::get('/phoneDownload', "WebController@phoneDownload")->name('phoneDownload');
 Route::get('/services/{service_id}/{department_id}/{year_id}', "WebController@showService")->name('services');
 Route::get('/news','WebController@news')->name('news');
 Route::get('/singleNews/{id}','WebController@singleNews')->name('singleNews');
 Route::get('/electronicbook','WebController@electronicbook')->name('electronicbook');

