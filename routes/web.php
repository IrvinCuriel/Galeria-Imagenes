<?php

/*
use Illuminate\Support\Facades\Route;

Auth::routes(['verify' => true]);

Route::get('{any}', function () {
    return view('app');
})->where('any', '.*');
*/


use Illuminate\Support\Facades\Route;

Route::get('/', 'InicioController')->name('inicio');

Auth::routes(['verify' => true]);

Route::group(['middleware' => ['auth', 'verified']], function() {
    Route::get('/establecimiento/create', 'GaleriaController@create')->name('establecimiento.create');
    Route::post('/establecimiento', 'GaleriaController@store')->name('establecimiento.store');
    Route::get('/establecimiento/edit', 'GaleriaController@edit')->name('establecimiento.edit');
    Route::put('/establecimiento/{establecimiento}', 'GaleriaController@update')->name('establecimiento.update');
    Route::post('/imagenes/store', 'ImagenController@store')->name('imagenes.store');
    Route::post('/imagenes/destroy', 'ImagenController@destroy')->name('imagenes.destroy');
});

Route::get('{mi_galeria}', function () {
    return view('app');
})->where('any', '.*');