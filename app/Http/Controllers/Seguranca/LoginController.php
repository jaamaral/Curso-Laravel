<?php

namespace App\Http\Controllers\Seguranca;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;
    protected $redirectTo = '/';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function index()
    {
        return view('seguranca.index');
    }

    protected function authenticated(Request $request, $user)
    {
        $roles = $user->roles()->where('estado',1)->get();
        if ($roles->isNotEmpty()){
            $user->setSession($roles->toArray());
        } else{
            $this->guard()->logout();
            $request->session()->invalidate();
            return redirect('seguranca/login')->withErrors(['error' => 'Este usuário não tem um perfil ativo']);
        }
    }

    public function username()
    {
        return 'usuario';
    }
}
