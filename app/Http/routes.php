<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::get('/', function () {
    //return view('welcome');
//});

Route::get('/', ['uses' =>'InicioController@index', 'as' => 'inicio.index' ]);

Route::resource('temas','TemasController');
Route::resource('subtemas','SubtemasController');
Route::resource('preguntas','PreguntasController');
Route::resource('usuarios','UsuariosController');

Route::get('temario',[
            'as'       => 'temario.inicio',
            'uses'     => 'TemarioController@index'
]);

Route::get('temario/{tema}/{id}',[
                'as'    =>  'temario.show',
                'uses'  =>  'TemarioController@show'
]);

Route::get('tema/{id}',[
        'as'    => 'temario.tema',
        'uses'  => 'TemarioController@tema'
]);

Route::get('respuestas', [
    'as' => 'respuestas.index',
    'uses' => 'RespuestasController@index'
]);

Route::get('respuestas/{id}/edit', [
    'as' => 'respuestas.edit',
    'uses' => 'RespuestasController@edit'
]);

Route::get('respuestas/habilitar', [
    'as'   => 'respuestas.habilitar',
    'uses' => 'RespuestasController@tablaPreg'
]);

Route::put('respuestas/habilitar', [
    'as'   => 'respuestas.habilitar',
    'uses' => 'RespuestasController@actPreg'
]);

Route::put('respuestas/{id}', [
    'as' => 'respuestas.update',
    'uses' => 'RespuestasController@update'
]);

Route::get('examen/{id}', [
    'as' => 'examen.show',
    'uses' => 'ExamenController@show'
]);

Route::get('auth/login', [
    'as'   => 'auth.login',
    'uses' => 'LoginController@getLogin'
]);

Route::post('auth/login', [
    'as'   => 'auth.login',
    'uses' => 'LoginController@postLogin'
]);

Route::get('auth/logout',[
    'as'    => 'auth.logout',
    'uses'  => 'LoginController@getLogout'
]);

Route::get('password/email','Auth\PasswordController@getEmail');
Route::post('password/email','Auth\PasswordController@postEmail');

Route::get('password/reset/{token}','Auth\PasswordController@getReset');
Route::post('password/reset','Auth\PasswordController@postReset');

Route::get('usuario/editar', [
    'as'   => 'usuario.edit',
    'uses' => 'UserController@getUser'
]);

Route::put('usuario/actualizar', [
    'as'   => 'usuario.update',
    'uses' => 'UserController@postUser'
]);

Route::get('usuario/pass', [
    'as'   => 'usuario.pass',
    'uses' => 'UserController@getPassword'
]);

Route::put('usuario/change', [
    'as'   => 'usuario.change',
    'uses' => 'UserController@postPassword'
]);

Route::get('examen/consulta/{id}', [
        'as'   => 'examen.consulta',
        'uses' => 'ExamenController@revisar'
]);

Route::post('examen/{pregunta}/{respuesta}', [
    'as'   => 'examen.insertar',
    'uses' => 'ExamenController@insregistro'
]);

Route::get('resultado',[
     'as'   => 'examen.resultado',
     'uses' => 'ExamenController@correctas'
]);

Route::get('verificar/{pregid}', ['middleware => cors', 'uses' => 'ExamenController@verificarPregunta']);

Route::get('lista',[
    'uses' => 'RespuestasController@registrosAlumnos',
    'as'   => 'respuestas.lista'
]);

Route::get('lista/alumno/{id}',[
    'uses' => 'RespuestasController@registroAlumno',
    'as'   => 'respuestas.alumno'
]);
