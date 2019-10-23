<?php

namespace App\Http\Middleware;

use Closure;

class PermissaoAdministrador
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($this->permissao())
            return $next($request);
        return redirect('/')->with('mensagem', 'Usuário sem permissão');
    }

    private function permissao()
    {
        return session()->get('role_nome') == 'administrador';
    }
}
