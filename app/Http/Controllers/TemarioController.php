<?php

namespace prytemas\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use prytemas\Http\Requests;
use prytemas\Http\Controllers\Controller;
use prytemas\Imagen;
use prytemas\Subtema;
use prytemas\Tema;

class TemarioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('estud');
    }

    public function index()
    {
        $temas = Tema::all();

        return view('temario.index',['temas' => $temas]);
    }

    public function show($tema, $id)
    {

        $temas = Tema::all();

        $subtema = Subtema::find($id);

        $theme = Tema::find($subtema->tema_id);

        $images = DB::table('imagenes')->where('subtema_id','=',$id)->first();

        return view('temario.show',['theme' => $theme,'temas' =>$temas , 'subtema' => $subtema, 'images' => $images]);
    }

    public function tema($id)
    {
        $temas = Tema::all();

        $tema = Tema::find($id);

        return view('temario.tema', ['tema' => $tema, 'temas' => $temas]);

    }

    public function missingMethod($parameters = array())
    {
        abort(404);
        abort(500);
    }

}
