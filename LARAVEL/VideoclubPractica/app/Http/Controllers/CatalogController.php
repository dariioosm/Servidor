<?php

namespace App\Http\Controllers;
use App\Models\Pelicula;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    //? ::all() coge todos los campos del array asociativo que se ha seleccionado

    public function getIndex(){
        return view('catalog.index',array('arrayPeliculas'=>Pelicula::all()));
    }

    public function getShow($id){
        return view('catalog.show',array('id'=>$id), array('arrayPeliculas'=>Pelicula::all()));
    }

    public function getCreate(){
        return view('catalog.view');
    }

    public function getEdit($id){
        return view('catalog.edit', array('id'=>$id));
    }
}
