<?php

namespace prytemas\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

use Storage;
use prytemas\Http\Requests;
use prytemas\Http\Controllers\Controller;
use prytemas\Imagen;
use prytemas\Subtema;
use prytemas\Tema;
use File;
use prytemas\Http\Requests\TemasRequest;
use Session;


class TemasController extends Controller
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
       $temas = Tema::paginate(2);

       return view('temas.index',['temas' => $temas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('temas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TemasRequest $request)
    {
        $tema = Tema::create([
            'titulo' => $request->get('titulo'),
            'descripcion' => $request->get('descripcion')
        ]);

        $item = $request->get('subitems');

        if($item == '1'){

            $numero = $request->get('numero');


            for($i = 0; $i<$numero; $i++){
                $subtema = Subtema::create([
                    'titulo' => $request->input('subtemas.'.$i.'.titulo'),
                    'texto' => $request->input('subtemas.'.$i.'.texto'),
                    'tema_id' => $tema->id
                ]);

                $ruta =  $tema->titulo . '/';
                $imagen = $request->file('imagen.'.$i.'.img');
                $path = $imagen->guessExtension();
                $nombre = $subtema->titulo . '.' . $path;

                Storage::disk('local')->put($ruta.$nombre, \File::get($imagen));

                Imagen::create([
                    'ruta' => $ruta,
                    'path' => $path,
                    'subtema_id' => $subtema->id
                ]);
            }
        }

        Session::flash('creado','Tema creado con exito');

        return redirect('temas');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $tema = Tema::find($id);

       return view('temas.edit', ['tema' => $tema]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TemasRequest $request, $id)
    {
        $tema = Tema::find($id);

        $imagenes = Imagen::imagenes($id);

        $nuevo = $request->get('titulo').'/';
        $viejo = $tema->titulo.'/';

        if($nuevo == $viejo){
            $tema->titulo = $request->get('titulo');
            $tema->descripcion = $request->get('descripcion');
            $tema->save();
        }else{
            foreach ($imagenes as $imagen){
                $file =  $imagen->titulo.'.'.$imagen->path;
                Storage::move($viejo.$file, $nuevo.$file);
            }
            $tema->titulo = $request->get('titulo');
            $tema->descripcion = $request->get('descripcion');
            $tema->save();
            Storage::deleteDirectory($viejo);
        }

        Session::flash('editado','Tema actualizado con exito');

        return redirect('temas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tema = Tema::find($id);

        $viejo = $tema->titulo;

        $tema->delete();

        Storage::deleteDirectory($viejo);

        Session::flash('eliminado','Tema eliminado con exito');

        return redirect('temas');
    }
}
