<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
    protected $table = 'imagenes';
    protected $primaryKey ='idimagen';
    public $timestamps=true;
    protected $fillable=['categoria','imagen','descripcion'];

    public function agendas(){
        //la misma imagen puede estar en varias agendas
        return $this->hasMany(Agenda::class,'idimagen');
    }


}
