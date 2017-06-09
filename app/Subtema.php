<?php

namespace prytemas;

use Illuminate\Database\Eloquent\Model;

class Subtema extends Model
{
    protected $table = 'subtemas';

    protected $fillable = ['titulo', 'texto', 'tema_id'];

    public function temas(){
        return $this->belongsTo('prytemas\Tema');
    }

    public function imagen(){
        return $this->belongsTo('prytemas\Imagen');
    }
}
