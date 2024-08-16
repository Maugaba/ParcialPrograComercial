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
