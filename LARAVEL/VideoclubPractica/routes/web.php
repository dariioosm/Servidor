<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    echo 'Pantalla principal';
    return view('home');
});

Route::get('login',function(){
    echo 'login usuario';
    return view('auth.login');
});
Route::get('logout',function(){
    echo 'logout usuario';
});
Route::get('catalog',function(){
    echo 'Listado de peliculas';
    return view('catalog.index');
});
Route::get('catalog/show{id}',function($id){
    echo 'Vista detalle '.$id;
    return view('catalog.show',array('id'=>$id));
});
Route::get('catalog/create',function(){
    return view('catalog.create');
});
Route::get('catalog/edit/{id}',function($id){
    echo 'Modificar pelicula '.$id;
    return view('catalog.edit');
});