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
Route::get('/complain', "WebController@complain")->name('complain');
Route::post('/storeComplain', "WebController@storeComplain")->name('storeComplain');
Route::get('/clinic', "WebController@clinic")->name('clinic');
Route::get('/storeClinic', 'WebController@storeClinic')->name('storeClinic');
Route::get('/phoneDownload', "WebController@phoneDownload")->name('phoneDownload');
Route::get('/services/{service}', "WebController@showService")->name('showService');
Route::get('/news', 'WebController@news')->name('news');
Route::get('/posts/{post}', 'WebController@singleNews')->name('singleNews');
Route::get('/e-books', 'WebController@eBooks')->name('e-books');
Route::get('/illiteracy', 'WebController@illiteracy')->name('illiteracy');
Route::get('/storeIlliteracy', 'WebController@storeIlliteracy')->name('storeIlliteracy');
Route::get('/notifications', 'WebController@notifications')->name('notifications');
Route::get('/about_us', 'WebController@about_us')->name('about_us');

