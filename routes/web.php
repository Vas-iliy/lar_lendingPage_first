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

Route::group(function () {
    Route::match(['get', 'post'], '/', 'IndexController@execute')->name('home');
    Route::get('/page/{alias}', 'PageController@execute')->name('page');

    Route::auth();
})->middleware('web');

Route::group(function () {
    Route::get('/', function () {

    });

    Route::group(function () {
        Route::get('/', 'PagesController@execute')->name('pages');
        Route::match(['get', 'post'], '/add', 'PagesAddController@execute')->name('pagesAdd');
        Route::match(['get', 'post', 'delete'], '/edit/{page}', 'PagesEditController@execute')->name('pagesEdit');
    })->prefix('pages');

    Route::group(function () {
        Route::get('/', 'PortfolioController@execute')->name('portfolio');
        Route::match(['get', 'post'], '/add', 'PortfolioAddController@execute')->name('portfolioAdd');
        Route::match(['get', 'post', 'delete'], '/edit/{portfolio}', 'PortfolioEditController@execute')->name('portfolioEdit');
    })->prefix('portfolios');

    Route::group(function () {
        Route::get('/', 'ServiceController@execute')->name('services');
        Route::match(['get', 'post'], '/add', 'ServiceAddController@execute')->name('serviceAdd');
        Route::match(['get', 'post', 'delete'], '/edit/{service}', 'ServiceEditController@execute')->name('serviceEdit');
    })->prefix('services');
})->prefix('admin')->middleware('auth');
