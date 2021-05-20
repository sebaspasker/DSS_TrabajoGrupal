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
Route::get('/', 'PublicationController@home')->name('home');
// ULTIMOS
Route::get('ultimos', 'PublicationController@ultimos')->name('ultimos');
// BUSCAR
Route::get('buscar', 'PublicationController@buscar')->name('buscar');

// PUBLICACION
Route::get('publicacion', 'PublicationController@publicacion')->name('publicacion');

// CATEGORIA
Route::view('categoria', 'public/categoria')->name('categoria');

// LOGIN
Route::view('login', 'public/login')->name('login');




/*
Parte Privada que ven los administradores
*/
// Publicaciones
//Route::view('manager', 'manager/publicaciones')->name('manager_publicaciones');
// nueva publicacion
Route::view('manager/publicacion/nueva', 'manager/nueva_publicacion')->name('manager_nueva_publicacion');

// empresas
Route::view('manager/empresas', 'manager/empresas')->name('manager_empresas');
// nueva empresa
Route::view('manager/empresa/nueva', 'manager/nueva_empresa')->name('manager_nueva_empresa');

// categorias
//Route::view('manager/categorias', 'manager/categorias')->name('manager_categorias');


// nueva categoria
Route::view('manager/categoria/nueva', 'manager/nueva_categoria')->name('manager_nueva_categoria');


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

// Create: crear nueva company
Route::get('manager/company_nueva', 'CompanyController@create')->name('company.create');

// Index: listado company
Route::get('manager/companies', 'CompanyController@index')->name('company.index');

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


//Publicaciones

// Create: crear nueva publicacion
Route::get('manager/publicacion_nueva', 'PublicationController@create')->name('publicacion.create');

// Index: listado publicacion
Route::get('manager/publicaciones', 'PublicationController@index')->name('publicacion.index');

// Store: guardar nueva publicacion
Route::post('manager/publicacion_nueva', 'PublicationController@store')->name('publicacion.store');

// Show: mostrar publicacion
Route::get('manager/publicacion/{publicacion}', 'PublicationController@show')->name('publicacion.show');

// Edit: editar publicacion
Route::get('manager/publicacion_editar/{publicacion}', 'PublicationController@edit')->name('publicacion.edit');

// Update: actualizar publicacion
Route::put('manager/publicacion_editar/{publicacion}', 'PublicationController@update')->name('publicacion.update');

// Delete: eliminar publicacion
Route::delete('manager/publicacion_editar/{publicacion}', 'PublicationController@destroy')->name('publicacion.delete');