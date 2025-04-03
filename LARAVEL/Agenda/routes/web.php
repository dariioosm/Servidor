<?php
use App\Http\Controllers\AgendaController;

use App\Http\Controllers\ImagenController;
use Illuminate\Support\Facades\Route;

Route::get('/imagen',[ImagenController::class,'index']);


Route::get('/agenda/create', [AgendaController::class, 'create'])->name('agenda.create');
Route::post('/agenda/store', [AgendaController::class, 'store'])->name('agenda.store');
Route::get('/agenda/show', [AgendaController::class, 'show'])->name('agenda.show');
