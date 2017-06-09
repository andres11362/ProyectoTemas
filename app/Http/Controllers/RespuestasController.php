<?php

namespace prytemas\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use prytemas\Http\Requests;
use prytemas\Http\Controllers\Controller;
use prytemas\Pregunta;
use prytemas\Registro;
use prytemas\Respuesta;
use Illuminate\Support\Facades\DB;
use prytemas\Http\Requests\RespuestasEditRequest;
use Session;

class RespuestasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index(){

        $respuestas = Respuesta::pregunta();

        return view('respuestas.index', ['respuestas' => $respuestas]);

    }

    public function edit($id){

        $respuesta = Respuesta::find($id);

        $pregunta = Pregunta::find($respuesta->pregunta_id);

        return view('respuestas.edit', ['respuesta' => $respuesta, 'pregunta' => $pregunta ]);

    }

    public function update(RespuestasEditRequest $request, $id){

        $respuesta = Respuesta::find($id);

        $respuesta->fill($request->all());

        $respuesta->save();

        Session::flash('editado','Respuesta actualizada con exito');

        return redirect('respuestas');

    }

    public function tablaPreg(){

        $preguntas = Pregunta::all();

        return view('respuestas.habilitar', ['preguntas' => $preguntas]);

    }

    public function actPreg(Request $request)
    {
           $datos = $request->get('value');

           $datauno = array();
           $datacero = array();

           foreach ($datos as $key => $dato)
           {
                if($dato == 1){
                    array_push($datauno, $key);
                }else{
                    array_push($datacero, $key);
                }
           }

            DB::table('preguntas')->whereIn('id', $datauno)->update(['habilitada' => true]);
            DB::table('preguntas')->whereIn('id', $datacero)->update(['habilitada' => false]);

        Session::flash('editado','Las respuestas seleccionadas se han habilitado');

        return redirect('respuestas/habilitar');

    }

    public function registrosAlumnos()
    {

        $lista = Registro::lista_correctas();

        $total  = DB::table('preguntas')->where('habilitada',1)->count();

        return view('respuestas.registros', ['lista' => $lista, 'total' => $total]);

    }

    public function registroAlumno($id)
    {
        $lista = Registro::preguntas_usuario($id);

        return view('respuestas.registro', ['lista' => $lista]);

    }

}
