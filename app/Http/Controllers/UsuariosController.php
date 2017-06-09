<?php

namespace prytemas\Http\Controllers;

use Illuminate\Http\Request;

use prytemas\Http\Requests;
use prytemas\Http\Controllers\Controller;
use prytemas\Http\Requests\UserRequest;
use prytemas\Http\Requests\UserEditRequest;
use prytemas\User;
use Illuminate\Support\Facades\Mail;
use Session;

class UsuariosController extends Controller
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
        $users = User::paginate(10);

        return view('users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $passrandom = substr(md5(microtime()),1,6);

        $usuario = User::create([
            'username' => $request->get('username'),
            'nombres'  => $request->get('nombres'),
            'email'    => $request->get('email'),
            'password' => $passrandom,
            'rol'      => $request->get('rol')
        ]);

        $datos = ['nombres'  => $request->get('nombres'),
                  'username' => $request->get('username'),
                  'password' => $passrandom,
                 ];

        Mail::send('emails.email', $datos, function ($msj) use ($usuario){
            $msj->subject('Correo de creacion de cuenta');
            $msj->to($usuario->email);
        });

        Session::flash('creado','Usuario creado con exito');
        return redirect('usuarios');
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
        $user = User::find($id);

        return view('users.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserEditRequest $request, $id)
    {
        $user = User::find($id);

        $user->fill($request->all());

        $user->save();

        Session::flash('editado','Usuario actualizado con exito');

        return redirect('usuarios');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);

        $user->delete();

        Session::flash('eliminado','Usuario eliminado con exito');

        return redirect('usuarios');
    }
}
