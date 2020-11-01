<?php

use Illuminate\Support\Facades\Auth;
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

Route::resource('/', 'HomeController');
//Auth::routes();

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');


// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');


//RUTAS DE ADMIN
Route::resource('/admin','AdminController');

//RUTAS DE CARRUSEL
Route::resource('/carrusel','CarruselController');
Route::get('/admin/carrusel/delete/{id}','CarruselController@destroy');
Route::post('/admin/carrusel/create','CarruselController@store');

//RUTAS DE CONTACTO
Route::resource('/contacto','ContactoController');

//RUTAS DE VIDEO
Route::resource('/videos','VideosController');
Route::get('/videos/delete/{id}','VideosController@destroy');
Route::post('/videos/create','VideosController@store');

//RUTAS DE INFORMACION
Route::resource('/informacion','InformacionController');
Route::get('/informacion/edit/{id}','InformacionController@edit');
Route::get('/informacion/delete/{id}','InformacionController@destroy');
Route::post('/informacion/edit/{id}','InformacionController@update');
Route::post('/informacion/create','InformacionController@store');

//RUTAS DE PRODUCTOS
Route::resource('/productos','ProductosController');
Route::get('/productos/edit/{id}','ProductosController@edit');
Route::get('/productos/delete/{id}','ProductosController@destroy');
Route::post('/productos/edit/{id}','ProductosController@update');
Route::post('/productos/create','ProductosController@store');

//RUTAS DE SUCURSALES
Route::resource('/sucursales','SucursalesController');
Route::get('/sucursales/edit/{id}','SucursalesController@edit');
Route::get('/sucursales/delete/{id}','SucursalesController@destroy');
Route::post('/sucursales/edit/{id}','SucursalesController@update');
Route::post('/sucursales/create','SucursalesController@store');

//RUTAS DE TIPOS DE PRODUCTOS
Route::resource('/categorias','TipoProductoController');
Route::get('/categorias/edit/{id}','TipoProductoController@edit');
Route::get('/categorias/delete/{id}','TipoProductoController@destroy');
Route::post('/categorias/edit/{id}','TipoProductoController@update');
Route::post('/categorias/create','TipoProductoController@store');
