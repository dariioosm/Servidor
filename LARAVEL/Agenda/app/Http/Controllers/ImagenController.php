<?php

namespace App\Http\Controllers;
use App\Models\Imagen;
use Illuminate\Http\Request;

class ImagenController extends Controller
{
 public function index (){
        $imagenes = Imagen::all();
        return view('imagen.index',compact('imagenes'));
    }
public function store(Request $request){
    if(!empty($request->categoria)&&!empty($request->imgaen)&&!empty($request->descripcion)){
        $i = new Imagen;
        $i->categoria=$request->post('idimagen');
        $i->imagen=$request->post('categoria');
        $i->imagen=$request->post('descripcion');
        $i->save();
        return redirect('imagen.index');

    }
}

}
