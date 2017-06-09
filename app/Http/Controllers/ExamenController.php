<?php

namespace prytemas\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use prytemas\Http\Requests;
use prytemas\Http\Controllers\Controller;
use prytemas\Registro;
use prytemas\Respuesta;
use Illuminate\Support\Facades\DB;

class ExamenController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('estud');
    }

    public function show($id)
    {
        $userid = Auth::user()->id;

        $preg = DB::table('preguntas')->where('habilitada',1)->count();

        $user = DB::table('registros')->where('usuario_id',$userid)->count();

        if($preg == $user){
            $val = true;
        }else{
            $val = false;
        }

        $preguntas = Respuesta::preg2($id);

        $sgte = $id +1;

        if($id == $preg){
            $band = true;
        }else{
            $band = false;
        }

        return view('examen.show', ['preguntas' => $preguntas, 'id' => $id, 'siguiente' => $sgte, 'band' => $band, 'val' => $val ]);
    }

    public function verificarPregunta(Request $request, $pregid){

        if($request->ajax()){
            $userid = Auth::user()->id;

            $verf = Registro::pregunta_respondida($userid,$pregid);

            if($verf == null){
                $valor = true;
            }else{
                $valor = false;
            }

            return response()->json([
                'registro' => $verf,
                'valor'    => $valor
            ]);
        }

    }

    public function correctas()
    {
        $id = Auth::user()->id;

        $ok = Registro::cantidad_correctas($id);

        $total  = DB::table('preguntas')->where('habilitada',1)->count();

        $por   = round(($ok/$total),2);

        $resul = round((($por*10)/2),2);

        return view('examen.resultado', ['correctas' => $ok, 'total' => $total, 'porcentaje' => $por, 'resultado' => $resul, 'val' => true]);
    }

    public function revisar(Request $request, $id)
    {
        if($request->ajax()){

            $res = Respuesta::register($id);

            return response()->json($res);

        }
    }

    public function insregistro(Request $request, $pregunta, $respuesta)
    {
        if($request->ajax()){

            $userid = Auth::user()->id;

            $verf = Registro::pregunta_respondida($userid,$pregunta);

            if($verf == null){
                Registro::create([
                    'respuesta_s' =>  $respuesta,
                    'pregunta_id' =>  $pregunta,
                    'usuario_id'  =>  Auth::user()->id
                ]);
                return response()->json(['valor' => false]);
            }else{
                return response()->json(['response' => $verf, 'valor' => true]);
            }
        }
    }



}
