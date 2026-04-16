<?php

use Illuminate\Http\Request;
use App\Models\Link;
use App\Models\Dept;
use App\Models\Company;
use Illuminate\Support\Facades\Response;

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

// Authentication Routes
Auth::routes();

// Public Routes
Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');

// Protected Routes (require authentication)
Route::middleware(['auth'])->group(function () {
    // Scroll/Config Routes
    Route::post('scroll', 'ConfigController@scrollStore')->name('scroll.store');
    Route::get('scroll/create', 'ConfigController@createScroll')->name('scroll.create')->middleware('admin');

    // Links Routes
    Route::get('url/list', 'LinkController@listLinks')->name('url.list')->middleware('admin');

    // Load Departments (AJAX)
    Route::get('loaddepts', 'DepartmentController@loadDepts')->name('loaddepts');

    // Resource Routes
    Route::resource('url', 'LinkController', ['parameters' => ['url' => 'id']]);
    Route::resource('message', 'MessageController', ['parameters' => ['message' => 'id']]);
    Route::resource('loc', 'LocationController', ['parameters' => ['loc' => 'id']]);
    Route::resource('comp', 'CompanyController', ['parameters' => ['comp' => 'id']]);
    Route::resource('config', 'ConfigController', ['parameters' => ['config' => 'id']]);
    Route::resource('dept', 'DepartmentController', ['parameters' => ['dept' => 'id']]);
    Route::resource('user', 'UserController', ['parameters' => ['user' => 'id']]);
});