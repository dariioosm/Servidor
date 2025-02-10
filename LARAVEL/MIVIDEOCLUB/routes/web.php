<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', array('nombre'=>'Pedro'));
});

Route::get('pagina1',function() {
    return 'estás en la pagina 1';
});

Route::get('pagina2/{id}',function($id){
    
    return 'Usuario '.$id;
});

Route::get('pagina3/{id?}',function($id=null){
    return $id;
});