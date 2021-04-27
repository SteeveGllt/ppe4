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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', ('PosteController@index'));
Route::resource('poste', 'PosteController');
Route::resource('type', 'TypeController');
Route::resource('message', 'MessageController');
Auth::routes();
//Route::post('password/new','ConfirmPasswordController@newPassword')->name('newPassword');
Route::get('/home', 'HomeController@index')->name('home');

Route::resource('user','UserController');

Route::get('/profil', 'UserController@profil')->name('user.profil');
Route::resource('categorie','CategorieController');
Route::resource('message','MessageController');
Route::get('site-register', 'SiteAuthController@siteRegister');
Route::post('site-register', 'SiteAuthController@siteRegisterPost');
Route::get('/validation', 'PosteController@validation')->name('poste.validation');
Route::get('/validation{id}', 'PosteController@editValid')->name('poste.editValid');
Route::resource('quizz','QuizzController');
Route::get('/postuler/{id}', 'PosteController@postuler')->name('poste.postuler');
Route::get('/unpostuler/{id}', 'PosteController@unPostuler')->name('poste.unPostuler');
Route::get('/mesoffres/', 'PosteController@mesOffres')->name('poste.offres');

Route::get('importExportView', 'MyController@importExportView')->name('importCsv');
Route::get('export', 'MyController@export')->name('export');
Route::post('import', 'MyController@import')->name('import');
Route::resource('message','MessageController');
