<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------

| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
Parte publica que ve todo el mundo
*/
// INICIO
Route::get('', 'PublicAuxController@home')->name('home');
// ULTIMOS
Route::get('ultimos', 'PublicationController@ultimos')->name('ultimos');
// BUSCAR
Route::get('buscar', 'PublicAuxController@buscar')->name('buscar');
// PUBLICACION
Route::get('publicacion/{id}', 'PublicationController@publicacion')->name('publicacion');




// CATEGORIA
Route::get('categoria/{id}', 'PublicAuxController@categoria')->name('categoria');
// LOGIN
Route::view('login', 'public/login')->name('login');
// CONTACTO
Route::get('contacto', 'PublicAuxController@contacto')->name('contacto');
// INFORMACION
Route::get('informacion', 'PublicAuxController@informacion')->name('informacion');


// BANNER
// Index de BANNER
Route::get('manager/banners', 'BannerController@index')->name('banner.index');

// Create de BANNER
Route::get('manager/banner/nuevo', 'BannerController@create')->name('banner.create');

// Store de BANNER
Route::post('manager/banner_nuevo', 'BannerController@store')->name('banner.store');

// Show de BANNER
Route::get('manager/banner/{banner}', 'BannerController@show')->name('banner.show');

// Edit de Banner
Route::get('manager/banners_edit/{banner}', 'BannerController@edit')->name('banner.edit');

// Update de Banner
Route::put('manager/banners_edit/{banner}', 'BannerController@update')->name('banner.update');

// Delete de Banner
Route::delete('manager/banners_edit/{banner}', 'BannerController@destroy')->name('banner.delete');




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



