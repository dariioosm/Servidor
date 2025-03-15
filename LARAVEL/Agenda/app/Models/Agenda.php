<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    protected $table = 'agenda';
    protected $fillable =['fecha','hora','idpersona','idimagen'];


    public function persona(){
        //Una agenda pertenece a una persona (teniendo en cuenta que tabla agenda es un registro)
        return $this->belongsTo(Persona::class,'idpersona');

    }

    public function imagen(){
        //Una agenda pertenece a una imagen (teniendo en cuenta que tabla agenda es un registro)
        return $this->belongsTo(Imagen::class,'idimagen');
    }


}

