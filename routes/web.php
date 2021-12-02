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



Route::get('/', ['uses' => 'Page@index']);

Route::get('/about', 'Page@about');

Route::get('/reg', 'Page@reg');

Route::get('/login', 'Page@login');

Route::get('/user/me', 'Page@userme');

Route::get('/tags/{id}', 'Page@find');

Route::post('/reg/ok','AuthController@reg_e')->name('regForm');

Route::post('/basket/ok','Page@confirm_order')->name('basketForm');

Route::post('/login/ok','AuthController@login_e')->name('loginForm');

Route::get('/login/vk', 'AuthController@login');

Route::get('/logout', 'AuthController@logout');

Route::get('/vk-auth', 'AuthController@auth');

Route::get('/bye/{id}', 'Page@bye');

Route::get('/basket_del/{id}', 'Page@basket_del');

Route::get('/basket', 'Page@basket');
