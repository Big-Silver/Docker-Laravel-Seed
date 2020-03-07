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

/**
 * Auth0
 * 
 */
// Route::get( '/auth0/callback', '\Auth0\Login\Auth0Controller@callback' )->name( 'auth0-callback' );
// Route::get( '/login', 'Auth\Auth0IndexController@login' )->name( 'login' );
// Route::get( '/logout', 'Auth\Auth0IndexController@logout' )->name( 'logout' )->middleware('auth');

// Route::get('/home', [
//    'middleware' => 'auth',
//    'uses' => 'HomeController@index',
// ]);

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
],
    function () {
        Auth::routes();
        Route::resource('/', 'WelcomeController');
        Route::get('/home', 'HomeController@index')->name('home');
});

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'auth', 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
], function () {
    Route::resource('contacts', 'ContactController');
    Route::resource('roles', 'RoleController');
    Route::resource('users', 'UserController');
    Route::resource('products', 'ProductController');

    Route::get('/file', 'FileController@index')->name('file');
    Route::post('file/upload', 'FileController@store')->name('file.upload');
    Route::post('upload', 'FileController@upload')->name('upload');

    Route::get('/email', 'MailController@index')->name('email');
    Route::post('/email/send', 'MailController@mail')->name('email.send');
});
