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

/*
Parte publica que ve todo el mundo
*/
// INICIO
Route::view('/', 'public/home')->name('home');
// ULTIMOS
Route::view('ultimos', 'public/ultimos')->name('ultimos');
// BUSCAR
Route::view('buscar', 'public/buscar')->name('buscar');
// CATEGORIA
Route::view('categoria', 'public/categoria')->name('categoria');
// PUBLICACION
Route::view('publicacion', 'public/publicacion')->name('publicacion');
// LOGIN
Route::view('login', 'public/login')->name('login');




/*
Parte Privada que ven los administradores
*/
// Publicaciones
Route::view('manager', 'manager/publicaciones')->name('manager_publicaciones');
// nueva publicacion
Route::view('manager/publicacion/nueva', 'manager/nueva_publicacion')->name('manager_nueva_publicacion');

// empresas
Route::view('manager/empresas', 'manager/empresas')->name('manager_empresas');
// nueva empresa
Route::view('manager/empresa/nueva', 'manager/nueva_empresa')->name('manager_nueva_empresa');

// categorias
Route::view('manager/categorias', 'manager/categorias')->name('manager_categorias');
// nueva categoria
Route::view('manager/categoria/nueva', 'manager/nueva_categoria')->name('manager_nueva_categoria');



