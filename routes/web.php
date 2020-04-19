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
        Route::get('/', 'AdminController@index')->name('admin.index');
    }
);


/////ADMIN-PANEL////////////ADMIN-PANEL////////////ADMIN-PANEL////////////ADMIN-PANEL////////////ADMIN-PANEL///////

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    return 'TEST!';
});
