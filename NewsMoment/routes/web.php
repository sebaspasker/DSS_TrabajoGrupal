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
use App\Http\Controllers\Auth\LoginController;
Route::get('login', [LoginController::class, 'get_login'])->name('login');
Route::post('login', [LoginController::class, 'post_login'])->name('login');
// CONTACTO
Route::get('contacto', 'PublicAuxController@contacto')->name('contacto');
// INFORMACION
Route::get('informacion', 'PublicAuxController@informacion')->name('informacion');


// BANNER
// Index de BANNER
Route::get('manager/banner_index', 'BannerController@index')->name('banner.index');

// Create de BANNER
Route::get('manager/banner_nuevo', 'BannerController@create')->name('banner.create');

// Store de BANNER
Route::get('manager/banner_nuevo', 'BannerController@create')->name('banner.create');

// Show de BANNER
Route::get('manager/banner/{banner}', 'BannerController@show')->name('banner.show');

// Edit de Banner
Route::get('manager/banners_edit/{banner}', 'BannerController@edit')->name('banner.edit');

// Update de Banner
Route::put('manager/banners_edit/{banner}', 'BannerController@update')->name('banner.update');

// Delete de Banner
Route::delete('manager/banners_edit/{banner}', 'BannerController@destroy')->name('banner.delete');

// PUBLICATIONS

// Index de PUBLICATION
Route::get('manager/publication_index', 'PublicationController@index')->name('publication.index');

/*
Parte Privada que ven los administradores
*/
// Publicaciones
Route::get('manager', 'PublicationManagerController@index')->name('manager_publicaciones');
// nueva publicacion
Route::get('manager/publicacion/nueva', 'PublicationManagerController@get_new')->name('manager_nueva_publicacion');
Route::post('manager/publicacion/post_nueva', 'PublicationManagerController@post_new')->name('manager_post_publicacion');

// empresas
Route::view('manager/empresas', 'manager/empresas')->name('manager_empresas');
// nueva empresa
Route::view('manager/empresa/nueva', 'manager/nueva_empresa')->name('manager_nueva_empresa');
// categorias
//Route::view('manager/categorias', 'manager/categorias')->name('manager_categorias');


// nueva categoria
Route::view('manager/categoria/nueva', 'manager/nueva_categoria')->name('manager_nueva_categoria');



// listado categorias
Route::get('manager/categorias', 'CategoryController@index')->name('manager_categorias');
