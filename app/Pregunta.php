<?php

namespace prytemas;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Pregunta extends Model
{
    //
    protected $table ="preguntas";

    protected $fillable = ['enunciado','habilitada','ruta','path'];

    public $timestamps = false;

    public function preguntas(){
        return $this->hasMany('prytemas\Respuesta');
    }

    public function registro(){
        return $this->hasMany('prytemas\Registro');
    }

}
