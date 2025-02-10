<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    echo 'Pantalla principal';
    return('home');
});

Route::get('login',function(){
    echo 'login usuario';
});
Route::get('logout',function(){
    echo 'logout usuario';
});
Route::get('catalog',function(){
    echo 'Listado de peliculas';
    return('catalog.inndex');
});
Route::get('catalog/show{id}',function($id){
    echo 'Vista detalle '.$id;
    return view('catalog.show',array('id'=>$id));
});
Route::get('catalog/create',function(){
    echo 'Añadir pelicula';
});
Route::get('catalog/edit/{id}',function($id){
    echo 'Modificar pelicula '.$id;
});