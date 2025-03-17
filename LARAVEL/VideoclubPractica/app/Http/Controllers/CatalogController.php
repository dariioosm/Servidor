<?php

namespace App\Http\Controllers;
use App\Models\Pelicula;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    //? ::all() coge todos los campos del array asociativo que se ha seleccionado

    public function getIndex(){
        $peliculas = Pelicula::all();
        return view('catalog.index',array('arrayPeliculas'=>$peliculas));
    }
    public function getShow($id)
    {
        return view('catalog.edit', array('id'=>$id), array('arrayPeliculas'=>Pelicula::all()));
    }

    public function getCreate(){
        return view('catalog.create');
    }

    public function getEdit($id){
        return view('catalog.edit', array('id'=>$id), array('arrayPeliculas'=>Pelicula::all()));
    }

    public function store(Request $request){
        if(!empty($request->title) && !empty($request->year) && !empty($request->director) && !empty($request->poster) && !empty($request->synopsis)){
                $p = new Pelicula;
                $p->title = $request->post('title');
                $p->year = $request->post('year');
                $p->director =$request->post('director');
                $p->poster = $request->post('poster');
                $p->synopsis =$request->post('synopsis');
                $p->save();
                return redirect(('catalog'));
               }
    }

    public function edit(Request $request, $id){
        $p = Pelicula::findOrFail($id);
        $p->title = $request->input('title');
        $p->year = $request->input('year');
        $p->director =$request->input('director');
        $p->poster = $request->input('poster');
        $p->synopsis =$request->input('synopsis');
        $p->save();
        return redirect('catalog/show'.$id);
    }
}
