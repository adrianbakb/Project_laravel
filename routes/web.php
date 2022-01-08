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
Auth::routes();
//routes dla funkcji użytkownika z grupy Lekarze
Route::group(['middleware' => 'auth'], function () {
  Route::get('/doctors/edit/{id}','App\Http\Controllers\DoctorController@edit');
  Route::post('/doctors/edit/','App\Http\Controllers\DoctorController@editStore');
  Route::get('/doctors/create','App\Http\Controllers\DoctorController@create');
  Route::post('/doctors','App\Http\Controllers\DoctorController@store');
  Route::get('/doctors/', 'App\Http\Controllers\DoctorController@index');
  Route::get('/doctors/{id}', 'App\Http\Controllers\DoctorController@show');
  Route::get('/doctors/specializations/{id}', 'App\Http\Controllers\DoctorController@listBySpecialization');
  Route::get('/doctors/delete/{id}', 'App\Http\Controllers\DoctorController@delete');
});
//routes dla funkcji użytkownika z grupy Pacjenci
Route::group(['middleware' => 'auth'], function () {
  Route::get('/patients/','App\Http\Controllers\PatientController@index');
  Route::get('/patients/create','App\Http\Controllers\PatientController@create');
  Route::post('/patients/','App\Http\Controllers\PatientController@store');
  Route::get('/patients/{id}','App\Http\Controllers\PatientController@show');
  Route::get('/patients/delete/{id}', 'App\Http\Controllers\PatientController@delete');
  Route::get('/patients/edit/{id}','App\Http\Controllers\PatientController@edit');
  Route::post('/patients/edit/','App\Http\Controllers\PatientController@editStore');
});
//routes dla funkcji użytkownika z grupy Sekretarki
Route::group(['middleware' => 'auth'], function () {
  Route::get('/secretary/','App\Http\Controllers\SecretaryController@index');
  Route::get('/secretary/create','App\Http\Controllers\SecretaryController@create');
  Route::post('/secretary/','App\Http\Controllers\SecretaryController@store');
  Route::get('/secretary/delete/{id}', 'App\Http\Controllers\SecretaryController@delete');
  Route::get('/secretary/{id}', 'App\Http\Controllers\SecretaryController@show');
  Route::get('/secretary/edit/{id}','App\Http\Controllers\SecretaryController@edit');
  Route::post('/secretary/edit/','App\Http\Controllers\SecretaryController@editStore');
});
//routes dla funkcji specjalizacji Lekarzy
Route::group(['middleware' => 'auth'], function () {
  Route::get('/specializations/','App\Http\Controllers\SpecializationController@index');
  Route::get('/specializations/create','App\Http\Controllers\SpecializationController@create');
  Route::post('/specializations/','App\Http\Controllers\SpecializationController@store');
});
//routes dla funkcji podglądu profilu użytkownika
Route::group(['middleware' => 'auth'], function () {
  Route::get('/panels/{id}', 'App\Http\Controllers\PanelController@show');
});
//routes dla funkcji podglądu/dodawania wizyt
Route::group(['middleware' => 'auth'], function () {
  Route::get('/visits','App\Http\Controllers\VisitController@index');
  Route::get('/visits/patient','App\Http\Controllers\VisitController@showPatientsVisits');
  Route::get('/visits/doctor','App\Http\Controllers\VisitController@showDoctorsVisits');
  Route::get('/visits/create','App\Http\Controllers\VisitController@create');
  Route::post('/visits/','App\Http\Controllers\VisitController@store');
});
//routes dla funkcji wysylania wiadomości
Route::group(['middleware' => 'auth'], function () {
  Route::get('/message/','App\Http\Controllers\MessageController@create');
  Route::post('/message/','App\Http\Controllers\MessageController@store');
});
//routes login
Route::post('/login', 'App\Http\Controllers\Auth\LoginController@login')->name('login');

Route::group(['middleware' => 'auth'], function () {
  Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');
});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('/user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('/profile/edit', 'App\Http\Controllers\ProfileController@edit');
	Route::put('/profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('/profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});
