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
Route::get('/', function(){
    return view('home');
})->name('home');


// BUSCAR
Route::get('buscar/{busqueda?}', function ($busqueda = "Busqueda por defecto") {
    echo "Busqueda: " . $busqueda ;
    echo "<br> <a href='" .  route('home') . "'>Volver a inicio</a>";
})->name('buscar');

// CATEGORIA
Route::get('categoria', function () {
    return 'vista de categoria';
})->name('categoria');

