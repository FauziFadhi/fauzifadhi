<?php

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


Route::resource('categories', 'CategoryController');
Route::resource('products', 'ProductController');
Route::resource('periods', 'PeriodController');
Route::resource('period-transactions', 'PeriodTransactionController');
Route::resource('period-rules', 'PeriodRuleController');
Route::resource('schedules', 'ScheduleController');

Route::get('/', function () {
    return view('layout.main');
});
