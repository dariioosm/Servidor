<?php

use App\Http\Controllers\ImagenController;
use Illuminate\Support\Facades\Route;

Route::get('/imagen',[ImagenController::class,'index'])->name('imagen.index');


