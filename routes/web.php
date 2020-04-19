<?php

use Illuminate\Support\Facades\Route;

/////ADMIN-PANEL////////////ADMIN-PANEL////////////ADMIN-PANEL////////////ADMIN-PANEL////////////ADMIN-PANEL///////
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::group(
    [
        'prefix' => 'admin',
        'namespace' => 'Admin',
//        'middleware' =>['auth', 'can:adminPanel'],
    ],

    function () {
        /** Admin */
        Route::get('/', 'AdminController@index')->name('admin.index');

        /** Album */
        Route::get('albums', 'AlbumController@index');
    }
);


/////ADMIN-PANEL////////////ADMIN-PANEL////////////ADMIN-PANEL////////////ADMIN-PANEL////////////ADMIN-PANEL///////

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    return 'TEST!';
});
