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

Route::resource('/', 'WelcomeController');

Route::get( '/auth0/callback', '\Auth0\Login\Auth0Controller@callback' )->name( 'auth0-callback' );
Route::get( '/login', 'Auth\Auth0IndexController@login' )->name( 'login' );
Route::get( '/logout', 'Auth\Auth0IndexController@logout' )->name( 'logout' )->middleware('auth');

Route::resource('contacts', 'ContactController', ['middleware' => 'auth']);

Route::get('/home', [
   'middleware' => 'auth',
   'uses' => 'HomeController@index',
]);

Route::get('role',[
   'middleware' => 'Role:user',
   'uses' => 'TestController@index',
]);

Route::get('terminate',[
   'middleware' => 'terminate',
   'uses' => 'ABCController@index',
]);

Route::get('profile', [
   'middleware' => 'auth',
   'uses' => 'UserController@showProfile'
]);

Route::get('/usercontroller/path',[
   'middleware' => 'First',
   'uses' => 'UserController@showPath'
]);

Route::resource('my','MyController');

Route::get('/validation','ValidationController@showform');
Route::post('/validation','ValidationController@validateform');

Route::get('/uploadfile','UploadFileController@index');
Route::post('/uploadfile','UploadFileController@showUploadFile');

Route::get('sendbasicemail','MailController@basic_email');
Route::get('sendhtmlemail','MailController@html_email');
Route::get('sendattachmentemail','MailController@attachment_email');

