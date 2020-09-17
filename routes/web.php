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
        Route::get( '/add', 'PagesAddController@execute')->name('pagesAdd');
        Route::post('/add', 'PagesAddController@input');
        Route::get( '/edit/{page}', 'PagesEditController@execute')->name('pagesEdit');
        Route::delete('/edit/{page}', 'PagesEditController@delete');
        Route::post('/edit/{page}', 'PagesEditController@input');
    });

    Route::resource('portfolios', 'PortfolioController')->except('show');

    Route::resource('services', 'ServiceController')->except('show');

   /* Route::group(['prefix'=> 'services'], function () {
        Route::get('/', 'ServiceController@execute')->name('services');
        Route::match(['get', 'post'], '/add', 'ServiceAddController@execute')->name('serviceAdd');
        Route::match(['get', 'post', 'delete'], '/edit/{service}', 'ServiceEditController@execute')->name('serviceEdit');
    });*/
});

Auth::routes();

