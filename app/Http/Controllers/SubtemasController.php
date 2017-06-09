<?php

namespace prytemas\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use prytemas\Http\Requests;
use prytemas\Http\Controllers\Controller;
use prytemas\Subtema;
use prytemas\Tema;
use prytemas\Imagen;
use File;
use Illuminate\Support\Facades\Storage;
use Session;
use prytemas\Http\Requests\SubtemasCreateRequest;
use prytemas\Http\Requests\SubtemasEditRequest;

class SubtemasController extends Controller
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
        $subtemas = Subtema::paginate(3);

        return view('subtemas.index',['subtemas' => $subtemas]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $theme = Tema::lists('titulo','id');
        return view('subtemas.create', compact('theme'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubtemasCreateRequest $request)
    {
        $temaid = $request->get('tema_id');

        $tema = Tema::find($temaid);

        $subtema = Subtema::create([
            'titulo' => $request->input('titulo'),
            'texto' => $request->input('texto'),
            'tema_id' => $temaid
        ]);

        $ruta =  $tema->titulo. '/';
        $imagen = $request->file('imagen');
        $path = $imagen->guessExtension();
        $nombre = $subtema->titulo . '.' . $path;

        Storage::disk('local')->put($ruta.$nombre, \File::get($imagen));

        Imagen::create([
            'ruta' => $ruta,
            'path' => $path,
            'subtema_id' => $subtema->id
        ]);

        Session::flash('creado','Subtema creado con exito');

        return redirect('subtemas');
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
        $subtema = Subtema::find($id);
        $theme = Tema::lists('titulo','id');

        return view('subtemas.edit', ['subtema' => $subtema, 'theme' => $theme]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SubtemasEditRequest $request, $id)
    {
        $subtema = Subtema::find($id);
        $images = DB::table('imagenes')->where('subtema_id','=',$id)->first();

        $oldpath = $images->path;

        $old = Tema::find($subtema->tema_id);

        $oldroute = $old->titulo.'/';

        $viejo = $subtema->titulo;

        $tema_id = $request->get('tema_id');
        $nuevo = $request->get('titulo');
        $texto = $request->get('texto');

        $subtema->titulo  =  $nuevo;
        $subtema->texto   =  $texto;
        $subtema->tema_id =  $tema_id;

        $tema = Tema::find($tema_id);

        $ruta   = $tema->titulo.'/';

        if($request->hasFile('imagen')){
            $imagen = $request->file('imagen');
            $path = $imagen->guessExtension();
            $file = $ruta.$nuevo.'.'.$path;
            Storage::delete($oldroute.$viejo.'.'.$oldpath);
            Storage::disk('local')->put($file, \File::get($imagen));
        }else{
            $path = $oldpath;
            if($nuevo != $viejo){
                Storage::move($oldroute.$viejo.'.'.$path, $ruta.$nuevo.'.'.$path);
            }else{
                if($ruta != $oldroute){
                    Storage::move($oldroute.$viejo.'.'.$path, $ruta.$viejo.'.'.$path);
                }
            }
        }

        $subtema->save();

        DB::table('imagenes')->where('subtema_id','=',$id)->update(['ruta' => $ruta, 'path' => $path ]);

        Session::flash('editado','Subtema actualizado con exito');

        return redirect('subtemas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subtema = Subtema::find($id);

        $images = DB::table('imagenes')->where('subtema_id','=',$id)->first();
        $path = '.'.$images->path;

        $tema_id = $subtema->tema_id;

        $tema = Tema::find($tema_id);
        $ruta = $tema->titulo.'/';

        $nombre = $subtema->titulo;

        $eliminar = $ruta.$nombre.$path;
        $subtema->delete();

        Storage::delete($eliminar);

        Session::flash('eliminado','Subtema eliminado con exito');

        return redirect('subtemas');

    }
}
