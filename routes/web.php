<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('books', 'BookController@index');
Route::post('books/import', 'BookController@import');
Route::get('books/export', 'BookController@export');
