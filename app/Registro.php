<?php

namespace prytemas;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Registro extends Model
{

    protected $table = 'registros';

    protected $fillable = ['respuesta_s', 'pregunta_id', 'usuario_id'];

    public function users(){
        return $this->belongsTo('prytemas\User');
    }

    public function preguntas(){
        return $this->belongsTo('prytemas\Pregunta');
    }


    public static function cantidad_correctas($id){
        return DB::table('registros')
            ->join('preguntas', 'registros.pregunta_id', '=', 'preguntas.id')
            ->join('users', 'registros.usuario_id', '=', 'users.id')
            ->join('respuestas', 'respuestas.pregunta_id', '=', 'preguntas.id')
            ->where('users.id',$id)
            ->whereRaw('respuestas.respuesta_correcta = registros.respuesta_s')
            ->count();
    }


    public static function pregunta_respondida($iduser, $idpreg){
        DB::statement("SET @x = 0;");
        $res = DB::select(DB::raw("SELECT (@x:= @x + 1) AS posicion,registros.respuesta_s, registros.pregunta_id FROM registros
        INNER JOIN preguntas on registros.pregunta_id=preguntas.id
        WHERE registros.usuario_id=$iduser
        HAVING posicion=$idpreg;"));
        return $res;
    }

    public static function lista_correctas()
    {
        return DB::table('registros')
            ->select('users.id','users.username', DB::raw('COUNT(*) as correctas '))
            ->join('preguntas', 'registros.pregunta_id', '=', 'preguntas.id')
            ->join('users', 'registros.usuario_id', '=', 'users.id')
            ->join('respuestas', 'respuestas.pregunta_id', '=', 'preguntas.id')
            ->whereRaw('respuestas.respuesta_correcta = registros.respuesta_s')
            ->groupBy('users.username')
            ->paginate(10);
    }

    public static function preguntas_usuario($id)
    {
        return DB::table('registros')
            ->join('preguntas', 'registros.pregunta_id', '=', 'preguntas.id')
            ->join('users', 'registros.usuario_id', '=', 'users.id')
            ->join('respuestas', 'respuestas.pregunta_id', '=', 'preguntas.id')
            ->where('registros.usuario_id','=',$id)
            ->select('users.username','users.nombres','preguntas.enunciado',
                     'respuestas.respuesta_correcta', 'registros.respuesta_s')
            ->paginate(10);
    }


}
