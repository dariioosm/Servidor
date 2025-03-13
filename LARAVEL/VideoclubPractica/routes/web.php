<?php

use App\Http\Controllers\CatalogController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
Route::get('/',[HomeController::class,'getHome']);

Route::get('login',function(){
    return view('auth.login');
});

Route::get('logout',function(){
    return view('');
});
Route::post('catalog',[CatalogController::class,'store'])->name('catalog.store');

Route::get('catalog',[CatalogController::class,'getIndex']);
Route::get('catalog/show/{id}',[CatalogController::class,'getShow']);
Route::get('catalog/create',[CatalogController::class,'getCreate']);
Route::get('catalog/edit/{id}',[CatalogController::class,'getEdit']);
