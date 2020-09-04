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

Route::get( '/', 'IndexController@execute')->name('home');
Route::post('/', 'IndexController@input');
Route::get('/page/{alias}', 'PageController@execute')->name('page');

Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('/', function () {
        if (view()->exists('admin.index')) {
            $title = 'Панель администратора';

            return view('admin.index', compact('title'));
        }
    });

    Route::group(['prefix'=> 'pages'], function () {
        Route::get('/', 'PagesController@execute')->name('pages');
        Route::match(['get', 'post'], '/add', 'PagesAddController@execute')->name('pagesAdd');
        Route::match(['get', 'post', 'delete'], '/edit/{page}', 'PagesEditController@execute')->name('pagesEdit');
    });

    Route::group(['prefix'=> 'portfolios'], function () {
        Route::get('/', 'PortfolioController@execute')->name('portfolio');
        Route::match(['get', 'post'], '/add', 'PortfolioAddController@execute')->name('portfolioAdd');
        Route::match(['get', 'post', 'delete'], '/edit/{portfolio}', 'PortfolioEditController@execute')->name('portfolioEdit');
    });

    Route::group(['prefix'=> 'services'], function () {
        Route::get('/', 'ServiceController@execute')->name('services');
        Route::match(['get', 'post'], '/add', 'ServiceAddController@execute')->name('serviceAdd');
        Route::match(['get', 'post', 'delete'], '/edit/{service}', 'ServiceEditController@execute')->name('serviceEdit');
    });
});

Auth::routes();

