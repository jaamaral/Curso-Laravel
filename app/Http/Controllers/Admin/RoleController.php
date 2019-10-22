<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidacaoRole;
use App\Models\Admin\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Role::orderBy('id')->get();
        return view('admin.role.index',compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function criar()
    {
        return view('admin.role.criar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function salvar(ValidacaoRole $request)
    {
        Role::create($request->all());
        return redirect('admin/role')->with('mensagem', 'Perfil criado com sucesso');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editar($id)
    {
        $data = Role::findOrFail($id);
        return view('admin.role.editar', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function atualizar(ValidacaoRole $request, $id)
    {
        Role::findOrFail($id)->update($request->all());
        return redirect('admin/role')->with('mensagem', 'Perfil atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function excluir(Request $request, $id)
    {
        if ($request->ajax()) {
            if (Role::destroy($id)) {
                return response()->json(['mensagem' => 'ok']);
            } else {
                return response()->json(['mensagem' => 'ng']);
            }
        } else {
            abort(404);
        }
    }
}
