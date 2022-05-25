<?php

use Illuminate\Support\Facades\Route;

Route::prefix('categorias')->middleware('auth')->group(function(){
    Route::get("", "CategoryController@index")->name("categorias");
    Route::get("novo", "CategoryController@create")->name("categoriasnovo");
    Route::get("{id}", "CategoryController@edit")->name("categoriasform");
    Route::post("", "CategoryController@store")->name("categoriasinsert");
    Route::put("{id}", "CategoryController@update")->name("categoriasupdate");
    Route::delete("{id}", "CategoryController@destroy")->name("categoriasdelete");
});


Route::prefix('postagens')->middleware('auth')->group(function(){
    Route::get("", "PostController@index")->name("postagens");
    Route::get("novo", "PostController@create")->name("postagensnovo");
    Route::get("{id}", "PostController@edit")->name("postagensform");
    Route::post("", "PostController@store")->name("postagensinsert");
    Route::put("{id}", "PostController@update")->name("postagensupdate");
    Route::delete("{id}", "PostController@destroy")->name("postagensdelete");
});

Route::prefix('ultimaspostagens')->group(function(){
    Route::get("", "PostRecentController@index")->name("ultimaspostagens");
});

Route::prefix('ultimaspostagens2')->group(function(){
    Route::get("", "PostRecentController2@index")->name("ultimaspostagens2");
});

Auth::routes();

Route::get('logout', 'Auth\LoginController@logout')->name('logout');