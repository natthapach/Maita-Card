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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get("/owner/report/{shop_id?}", "ReportController@home")->name("report");
Route::get("/owner/report/exchange-promotion/{shop_id}", "ReportController@exchangePromotion")->name("exchange-promotion");
Route::get("/owner/report/exchange-age/{shop_id}", "ReportController@exchangeAge")->name("exchange-age");
Route::get("/owner/report/exchange-gender/{shop_id}", "ReportController@exchangeGender")->name("exchange-age");

Route::get("/storage/{filename}", "StorageController@show");
