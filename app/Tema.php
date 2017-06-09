<?php

namespace prytemas;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Tema extends Model
{
    protected $table = 'temas';

    protected $fillable = ['titulo','descripcion'];

    public $timestamps = false;

    public function subtemas(){
        return $this->hasMany('prytemas\Subtema');
    }


}
