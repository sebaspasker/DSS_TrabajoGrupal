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

// INICIO
Route::view('/', 'home')->name('home');

// ULTIMOS
Route::view('ultimos', 'ultimos')->name('ultimos');

// BUSCAR
Route::view('buscar', 'buscar')->name('buscar');

// CATEGORIA
Route::view('categoria', 'categoria')->name('categoria');


// PUBLICACION
Route::view('publicacion', 'publicacion')->name('publicacion');


// LOGIN
Route::view('login', 'login')->name('login');


