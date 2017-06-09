<?php

namespace prytemas;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Respuesta extends Model
{
    //
    protected $table ="respuestas";

    protected $fillable = ['respuesta1','respuesta2','respuesta3','respuesta4','respuesta_correcta', 'pregunta_id'];

    public $timestamps = false;

    public function preguntas(){
        return $this->belongsTo('prytemas\Pregunta');
    }

    public static function pregunta(){
    return DB::table('respuestas')
        ->join('preguntas', 'preguntas.id', '=', 'respuestas.pregunta_id')
        ->select('respuestas.*','preguntas.enunciado')
        ->paginate(5);
    }

    public static function register($id)
    {
        DB::statement("SET @x = 0;");
        $res = DB::select(DB::raw("SELECT (@x:= @x + 1) AS posicion, respuestas.respuesta_correcta, preguntas.id as preguntaid FROM respuestas
            JOIN preguntas ON preguntas.id=respuestas.pregunta_id
            WHERE preguntas.habilitada=1
            HAVING posicion=$id;"));
        return $res;
    }


    public static function preg($id){
        return DB::table('respuestas')
            ->join('preguntas', 'preguntas.id', '=', 'respuestas.pregunta_id')
            ->where('preguntas.id',$id)
            ->select('respuestas.*','preguntas.enunciado')
            ->get();
    }

    public static function preg2($id){
        DB::statement("SET @x = 0;");
        $res = DB::select(DB::raw("SELECT (@x:= @x + 1) AS posicion, respuestas.*, preguntas.enunciado, preguntas.path FROM respuestas
        JOIN preguntas ON preguntas.id=respuestas.pregunta_id
        WHERE preguntas.habilitada=1
        HAVING posicion=$id;"));
        return $res;
    }






}
