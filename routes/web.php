<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});
Route::get('/buku', 'BukuController@index');
Route::get('/buku/create', 'BukuController@create')->name('buku.create');
Route::post('/buku', 'BukuController@store')->name('buku.store');
Route::post('/buku/delete/{id}', 'BukuController@destroy')->name('buku.destroy');
Route::get('/buku/edit/{id}', 'BukuController@edit')->name('buku.edit');
Route::post('/buku/update/{id}', 'BukuController@update')->name('buku.update');
Route::get('/buku/search', 'BukuController@search')->name('buku.search');
