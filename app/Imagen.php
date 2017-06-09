<?php

namespace prytemas;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Imagen extends Model
{
    protected $table = "imagenes";

    protected $fillable = ['ruta', 'path', 'subtema_id'];

    public function subtemas(){
        return $this->hasOne('prytemas\Subtema');
    }

    public static function imagenes($id){
        return DB::table('imagenes')
               ->join('subtemas','subtemas.id', '=', 'imagenes.subtema_id')
               ->join('temas', 'temas.id','=','subtemas.tema_id')
               ->where('temas.id', $id)
               ->select('imagenes.path','subtemas.titulo')
               ->get();
    }

    public static function images(){
        return DB::table('imagenes')
            ->join('subtemas','subtemas.id', '=', 'imagenes.subtema_id')
            ->join('temas', 'temas.id','=','subtemas.tema_id')
            ->select('imagenes.*','subtemas.*','temas.titulo as titulo_tema')
            ->get();
    }


}
