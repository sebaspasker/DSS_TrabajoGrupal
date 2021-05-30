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
Route::get('publicacion/{id}', 'PublicationController@show')->name('publicacion');

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
Route::delete('manager/banners_eliminar/{banner}', 'BannerController@destroy')->name('banner.delete');




//Category

// Create: crear nueva categoria
Route::get('manager/categoria_nueva', 'CategoryController@create')->name('category.create');
// Index: listado categorias
Route::get('manager/categorias', 'CategoryController@index')->name('category.index');
// Store: guardar nueva categoria
Route::post('manager/categoria_nueva', 'CategoryController@store')->name('category.store');
// Show: mostrar categoria
Route::get('manager/categoria/{category}', 'CategoryController@show')->name('category.show');
// Edit: editar categoria
Route::get('manager/categoria_editar/{category}', 'CategoryController@edit')->name('category.edit');
// Update: actualizar categoria
Route::put('manager/categoria_editar/{category}', 'CategoryController@update')->name('category.update');
// Delete: eliminar categoria
Route::delete('manager/categoria_editar/{category}', 'CategoryController@destroy')->name('category.delete');



//Company
// Index: listado company
Route::get('manager/companies', 'CompanyController@index')->name('company.index');
// Create: crear nueva company
Route::get('manager/company_nueva', 'CompanyController@create')->name('company.create');
// Store: guardar nueva company
Route::post('manager/company_nueva', 'CompanyController@store')->name('company.store');
// Show: mostrar company
Route::get('manager/company/{company}', 'CompanyController@show')->name('company.show');
// Edit: editar company
Route::get('manager/company_editar/{company}', 'CompanyController@edit')->name('company.edit');
// Update: actualizar company
Route::put('manager/company_editar/{company}', 'CompanyController@update')->name('company.update');
// Delete: eliminar company
Route::delete('manager/company_editar/{company}', 'CompanyController@destroy')->name('company.delete');



//PUBLICACIONES

// Index: listado publicacion
Route::get('manager', 'PublicationController@index')->name('publicacion.index');
// Create: crear nueva publicacion
Route::get('manager/publicacion_nueva', 'PublicationController@create')->name('publicacion.create');
// Store: guardar nueva publicacion
Route::post('manager/publicacion_nueva', 'PublicationController@store')->name('publicacion.store');
// Show: mostrar publicacion
Route::get('manager/publicacion/{publicacion}', 'PublicationController@show')->name('publicacion.show');
// Edit: editar publicacion
Route::get('manager/publicacion_editar/{publicacion}', 'PublicationController@edit')->name('publicacion.edit');
// Update: actualizar publicacion
Route::put('manager/publicacion_editar/{publicacion}', 'PublicationController@update')->name('publicacion.update');
// Delete: eliminar publicacion
Route::delete('manager/publicacion_eliminar/{publicacion}', 'PublicationController@destroy')->name('publicacion.delete');


