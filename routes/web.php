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

Route::group(['prefix' => '/', 'namespace' => 'Web'], function () {
    Route::get('/', 'AuthController@login')->name('web.index');
    Route::post('/login', 'AuthController@login')->name('web.login');

    Route::group(['prefix' => 'admin'], function () {
        Route::get('/login', 'AuthController@login')->name('web.admin.login');
        Route::post('/signin', 'AuthController@signin')->name('web.admin.signin');
        Route::get('/signout', 'AuthController@signout')->middleware('role:admin,operator')->name('web.auth.signout');

        Route::group(['prefix' => 'label'], function () {
            Route::get('/input', 'IndexController@index')->middleware('role:admin,operator')->name('web.dashboard.index');
            Route::post('/print', 'IndexController@print')->middleware('role:admin,operator')->name('web.dashboard.print');

            Route::get('/{label}/edit', 'IndexController@edit')->name('web.label.edit');
            Route::post('/{label}/update', 'IndexController@update')->name('web.label.update');
            Route::post('/{label}/update_only', 'IndexController@updateOnly')->name('web.label.update_only');
            Route::get('/{label}/delete', 'IndexController@delete')->name('web.label.delete');

            Route::get('/export/excel', 'IndexController@exportExcel')->middleware('role:admin,operator')->name('web.label.export.excel');
            Route::get('/export/pdf', 'IndexController@exportPDF')->middleware('role:admin,operator')->name('web.label.export.pdf');
            Route::get('/print', 'IndexController@printView')->middleware('role:admin,operator')
                ->name('web.label.print');
        });

        Route::group(['prefix' => 'user', 'middleware' => 'role:admin'], function () {
            Route::get('/', 'UserController@index')->name('web.user.index');
            Route::get('/create', 'UserController@create')->name('web.user.create');
            Route::post('/', 'UserController@insert')->name('web.user.insert');
            Route::get('/{user}', 'UserController@detail')->name('web.user.detail');
            Route::get('/{user}/edit', 'UserController@edit')->name('web.user.edit');
            Route::post('/{user}/update', 'UserController@update')->name('web.user.update');
            Route::get('/{user}/delete', 'UserController@delete')->name('web.user.delete');
            Route::get('/bulk/bulk-import', 'UserController@bulkImport')->name('web.user.bulk_import');
            Route::post('/bulk/bulk-import', 'UserController@import')->name('web.user.bulk_import_post');

        });

        // Route untuk halaman Data Label
        Route::group(['prefix' => 'label', 'middleware' => 'role:admin,operator'], function () {
            Route::get('/data', 'IndexController@dataLabel')->name('web.label.index');
        });

    });


});
