<?php

namespace prytemas\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Session;

class Admin
{

    protected $auth;

    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if($this->auth->user()->rol != 'Admin'){
            Session::flash('message-error', 'El usuario no tiene privilegios');
            return redirect()->to('/');
        }

        return $next($request);
    }
}
