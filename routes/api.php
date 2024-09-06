<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('employees', 'App\Http\Controllers\EmployeeController@index');
Route::get('employees/{id}', 'App\Http\Controllers\EmployeeController@show');
Route::post('employees', 'App\Http\Controllers\EmployeeController@store');
Route::post('employees/{id}', 'App\Http\Controllers\EmployeeController@update');
Route::delete('employees/{id}', 'App\Http\Controllers\EmployeeController@destroy');

Route::get('projects', 'App\Http\Controllers\ProjectController@index');
Route::get('projects/{id}', 'App\Http\Controllers\ProjectController@show');
Route::post('projects', 'App\Http\Controllers\ProjectController@store');
Route::post('projects/{id}', 'App\Http\Controllers\ProjectController@update');
Route::post('projects/{id}/assign-employees', 'App\Http\Controllers\ProjectController@assignEmployees');

// Rutas para Alerts
Route::get('alerts', 'App\Http\Controllers\AlertController@index');
Route::get('alerts/{id}', 'App\Http\Controllers\AlertController@show');
Route::post('alerts', 'App\Http\Controllers\AlertController@store');
Route::post('alerts/{id}', 'App\Http\Controllers\AlertController@update');
Route::delete('alerts/{id}', 'App\Http\Controllers\AlertController@destroy');
Route::put('alerts/{id}', 'App\Http\Controllers\AlertController@update');
Route::patch('alerts/{id}', 'App\Http\Controllers\AlertController@update');
