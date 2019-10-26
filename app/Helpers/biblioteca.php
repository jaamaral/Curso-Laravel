<?php

use App\Models\Admin\Permissao;
use Illuminate\Database\Eloquent\Builder;

if (!function_exists('getMenuAtivo')) {
    function getMenuAtivo($rota)
    {
        if (request()->is($rota) || request()->is($rota . '/*')) {
            return 'active';
        } else {
            return '';
        }
    }
}
if (!function_exists('canUser')) {
    function can($permissao, $redirect = true)
    {
        if (session()->get('role_nome') == 'administrador') {
            return true;
        } else {
            $roleId = session()->get('role_id');
            $permissoes = cache()->tags('Permissao')->rememberForever("Permissao.roleid.$roleId", function () {
                return Permissao::whereHas('roles', function ($query) {
                    $query->where('role_id', session()->get('role_id'));
                })->get()->pluck('filtro')->toArray();
            });
            if (!in_array($permissao, $permissoes)) {
                if ($redirect) {
                    if (!request()->ajax())
                        return redirect()->route('inicio')->with('mensagem', 'Não tem permissão para acessar esse módulo')->send();
                    abort(403, 'Não tem permissão');
                } else {
                    return false;
                }
            }
            return true;
        }
    }
}