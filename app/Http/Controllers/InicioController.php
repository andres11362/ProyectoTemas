<?php

namespace prytemas\Http\Controllers;

use Illuminate\Http\Request;

use prytemas\Http\Requests;
use prytemas\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class InicioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

   public function index(){

       $userid = Auth::user()->id;

       $preg = DB::table('preguntas')->where('habilitada',1)->count();

       $user = DB::table('registros')->where('usuario_id',$userid)->count();

       if($preg == $user){
           $val = 1;
       }else{
           $val = 0;
       }

       return view('inicio.index', ['val' => $val, 'band' => true]);
   }
}
