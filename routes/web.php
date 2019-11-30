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

Route::get('/', function () {
    return view('layout.main');
});

// Route::get('/product-category', function () {
//     return view('master.index');
// });

Route::get('/period', function () {
    return view('period.index');
});

Route::get('/period/3/stock', function () {
    return view('period.detail');
});

Route::get('/schedule', function () {
    return view('schedule.index');
});
