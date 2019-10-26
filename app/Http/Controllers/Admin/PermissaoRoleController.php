<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Permissao;
use App\Models\Admin\Role;
use Illuminate\Http\Request;

class PermissaoRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::orderBy('id')->pluck('nome', 'id')->toArray();
        $permissoes = Permissao::get();
        $permissoesRoles = Permissao::with('roles')->get()->pluck('roles', 'id')->toArray();
        return view('admin.permissao-role.index', compact('roles', 'permissoes', 'permissoesRoles'));
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function salvar(Request $request)
    {
        if ($request->ajax()) {
            $permissoes = new Permissao();
            if ($request->input('estado') == 1) {
                $permissoes->find($request->input('permissao_id'))->roles()->attach($request->input('role_id'));
                return response()->json(['resposta' => 'A função foi atribuída corretamente']);
            } else {
                $permissoes->find($request->input('permissao_id'))->roles()->detach($request->input('role_id'));
                return response()->json(['resposta' => 'A função foi excluída corretamente']);
            }
        } else {
            abort(404);
        }
    }
}
