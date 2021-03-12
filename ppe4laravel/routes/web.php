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
Auth::routes();
Route::post('password/new','ConfirmPasswordController@newPassword')->name('newPassword');
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('user','UserController');

Route::resource('categorie','CategorieController');

Route::get('/validation', 'PosteController@validation')->name('poste.validation');
Route::get('/validation{id}', 'PosteController@editValid')->name('poste.editValid');
