<?php

namespace prytemas\Http\Controllers\Auth;

use prytemas\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Auth;

class PasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    protected $redirectTo = '/';
    protected function resetPassword($user, $password){
        $user->password = $password;
        $user->save();
        Auth::login($user);
    }

    /**
     * Create a new password controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
        $this->subject = 'Pedido de perdida de contraseña';
    }
}
