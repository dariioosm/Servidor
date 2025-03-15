<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $table='personas';
    protected $primaryKey='idpersona';
    public $timestamps=true;

    protected $fillable=['nombre','apellidos','edad'];

    public function agendas(){
        //Una persona puede tener varias agendas (registros)
        return $this->hasMany(Agenda::class,'idpersona');
    }
}
