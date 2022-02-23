<?php

use Illuminate\Support\Facades\Route;

/* Dashboard Routes */
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['admin']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

Route::group(['namespace' => 'Admin', 'prefix' => 'dashboard', 'as' => 'admin.', 'middleware' => ['admin']], function () {
    Route::name('dashboard')->get('/', 'HomeController@index');
    // Collages
    Route::resource('collages', 'CollagesController', ['except' => 'show']);
    // Departments
    Route::resource('departments', 'DepartmentsController', ['except' => 'show']);
    // Admin Departments
    Route::resource('admin_departments', 'AdminDepartmentsController', ['except' => 'show']);
    // Admins
    Route::resource('admins', 'AdminsController', ['except' => 'show']);
    // Services
    Route::resource('services', 'ServicesController', ['except' => 'show']);
    // Service Layers
    Route::resource('services.service_layers', 'ServiceLayersController', ['except' => 'show']);
    // Articles
    Route::resource('posts', 'PostsController');
    Route::post('posts/{post}/photos', 'ImagesController@store')->name('store_photo');
    Route::delete('photos/{photo}', 'ImagesController@destroy')->name('destroy_photo');
    // Contacts
    Route::resource('contacts', 'ContactsController', ['only' => ['index', 'show', 'destroy']]);
    /* ====== About =======*/
    Route::name('abouts.edit')->get('abouts/edit', 'AboutsController@edit');
    Route::name('abouts.update')->patch('abouts/edit', 'AboutsController@update');
    /* ====== Settings =======*/
    Route::name('settings.edit')->get('settings/edit', 'SettingsController@edit');
    Route::name('settings.update')->patch('settings/edit', 'SettingsController@update');
});

Route::group(['namespace' => 'Admin'], function () {
    Route::get('dashboard_login', 'AuthController@loginForm')->name('login_form');
    Route::post('dashboard_logged', 'AuthController@login')->name('admin_logged');
    Route::post('dashboard_logout', 'AuthController@logout')->name('admin_logout');
});
