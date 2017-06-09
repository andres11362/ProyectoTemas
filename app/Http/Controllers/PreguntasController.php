<?php

namespace prytemas\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

use prytemas\Http\Requests;
use prytemas\Http\Controllers\Controller;
use prytemas\Pregunta;
use prytemas\Respuesta;
use Illuminate\Support\Facades\DB;
use File;
use Illuminate\Support\Facades\Storage;
use prytemas\Http\Requests\PreguntasRequest;
use Session;

class PreguntasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $preguntas=Pregunta::paginate(10);

        return view('preguntas.index',['preguntas' => $preguntas]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('preguntas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PreguntasRequest $request)
    {
       if($request->hasFile('imagen')){
           $ruta    = 'preguntas/';
           $imagen  = $request->file('imagen');
           $path    = $imagen->guessExtension();
           $nombre  = Carbon::now()->second.'.'.$path;
           Storage::disk('local')->put($ruta.$nombre, \File::get($imagen));
       }else{
           $ruta = null;
           $nombre = null;
       }

        $pregunta = Pregunta::create([
            'enunciado'  =>  $request->get('enunciado'),
            'habilitada' =>  false,
            'ruta'       =>  $ruta,
            'path'       =>  $nombre
        ]);

       $esc  = $request->input('escogida');

       $res = $esc+1;

       Respuesta::create([
                'respuesta1'            =>  $request->input('respuesta.0'),
                'respuesta2'            =>  $request->input('respuesta.1'),
                'respuesta3'            =>  $request->input('respuesta.2'),
                'respuesta4'            =>  $request->input('respuesta.3'),
                'respuesta_correcta'    =>  $res,
                'pregunta_id'           =>  $pregunta->id
        ]);

       Session::flash('creado','Pregunta creada con exito');

       return redirect('preguntas');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pregunta=Pregunta::find($id);
        return view('preguntas.edit', ['pregunta'=>$pregunta]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PreguntasRequest $request, $id)
    {
        $pregunta=Pregunta::find($id);

        $pregunta->enunciado=$request->get('enunciado');

        $viejo = $pregunta->path;

        if($request->hasFile('imagen')){
            $ruta    = 'preguntas/';
            if($pregunta->path != null){
                $imagen  = $request->file('imagen');
                $path    = $imagen->guessExtension();
                $nombre  = Carbon::now()->second.'.'.$path;
                Storage::delete($ruta.$viejo);
                Storage::disk('local')->put($ruta.$nombre, \File::get($imagen));
                $pregunta->ruta = $ruta;
                $pregunta->path = $nombre;
            }else{
                $imagen  = $request->file('imagen');
                $path    = $imagen->guessExtension();
                $nombre  = Carbon::now()->second.'.'.$path;
                Storage::disk('local')->put($ruta.$nombre, \File::get($imagen));
                $pregunta->ruta = $ruta;
                $pregunta->path = $nombre;
            }
        }

        $pregunta->save();

        Session::flash('editado','Pregunta actualizada con exito');

        return redirect('preguntas');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $preguntas=Pregunta::find($id);

        $ruta  = 'preguntas/';

        $path = $preguntas->path;

        $preguntas->delete();

        if($path != null){
            Storage::delete($ruta.$path);
        }

        $this->cleanup();

        Session::flash('eliminado','Pregunta eliminada con exito');

        return redirect('preguntas');
    }


    private function cleanup()
    {       
        DB::statement("SET @count = 0;");
        DB::statement("UPDATE preguntas SET preguntas.id = @count:= @count + 1;");
        DB::statement("ALTER TABLE preguntas AUTO_INCREMENT = 1;");
    }


}
