<?php

namespace prytemas\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use prytemas\Http\Requests;
use prytemas\Http\Controllers\Controller;
use prytemas\Http\Requests\UsuarioRequest;
use prytemas\Http\Requests\PasswordRequest;
use prytemas\User;
use Session;

class UserController extends Controller
{
    public function getUser()
    {
        $user = Auth::user();

        return view('usuario.edit', ['user' => $user]);
    }

    public function postUser(UsuarioRequest $request)
    {
        $user = Auth::user();

        $user->fill($request->all());

        $user->save();

        Session::flash('creado','Ha editado sus datos con exito');

        return redirect('/');

    }

    public function getPassword()
    {
        return view('usuario.password');
    }

    public function postPassword(PasswordRequest $request)
    {
        $user = Auth::user();

        $current_password = $request->input('current_password');
        $password = $request->input('password');

        if(Hash::check($current_password,$user->password)){
            $user->password = $password;
            $user->save();
            Session::flash('creado','Ha cambiado su contraseña con exito');
            return redirect('/');
        }else{
            Session::flash('eliminado','Ha habido un problema al cambiar su contraseña');
            return view('usuario.password');
        }

    }



}
