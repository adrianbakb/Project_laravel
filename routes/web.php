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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/doctors/edit/{id}','App\Http\Controllers\DoctorController@edit');
Route::post('/doctors/edit/','App\Http\Controllers\DoctorController@editStore');
Route::get('/doctors/create','App\Http\Controllers\DoctorController@create');
Route::post('/doctors','App\Http\Controllers\DoctorController@store');
Route::get('/doctors/', 'App\Http\Controllers\DoctorController@index');
Route::get('/doctors/{id}', 'App\Http\Controllers\DoctorController@show');
Route::get('/doctors/specializations/{id}', 'App\Http\Controllers\DoctorController@listBySpecialization');
Route::get('/doctors/delete/{id}', 'App\Http\Controllers\DoctorController@delete');

Route::get('/patients/','App\Http\Controllers\PatientController@index')->middleware('auth');
Route::get('/patients/{id}','App\Http\Controllers\PatientController@show')->middleware('auth');
Route::post('/patients/','App\Http\Controllers\PatientController@store');

Route::get('/specializations/','App\Http\Controllers\SpecializationController@index');
Route::get('/specializations/create','App\Http\Controllers\SpecializationController@create');
Route::post('/specializations/','App\Http\Controllers\SpecializationController@store');

Route::get('/panels/{id}', 'App\Http\Controllers\PanelController@show');

Route::get('/visits','App\Http\Controllers\VisitController@index');
Route::get('/visits/create','App\Http\Controllers\VisitController@create');
Route::post('/visits/','App\Http\Controllers\VisitController@store');

Route::post('/login', 'App\Http\Controllers\LoginController@logout')->name('logout');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home')->middleware('auth');

//Route::group(['middleware' => 'auth'], function () {
//	Route::resource('/user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
//	Route::get('/profile/edit', 'App\Http\Controllers\ProfileController@edit');
//	Route::put('/profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
//	Route::put('/profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});
