<?php

namespace prytemas\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use prytemas\Http\Requests;
use prytemas\Http\Controllers\Controller;
use prytemas\Http\Requests\LoginRequest;
use Session;

class LoginController extends Controller
{
    public function getLogin(){
        return view('auth.login');
    }

    public function postLogin(LoginRequest $request){
        if(Auth::attempt(['username' => $request['username'], 'password' => $request['password']])){
            return Redirect::to('/');
        }else{
            Session::flash('message-error','Usuario y/o contraseña incorrectos');
            return Redirect::to('auth/login');
        }
    }

    public function getLogout(){
        Auth::logout();
        return Redirect::to('/');
    }

}
