<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Permissao;
use Illuminate\Http\Request;
use App\Http\Requests\ValidarPermissao;

class PermissaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissoes = Permissao::orderBy('id')->get();
        return view('admin.permissao.index', compact('permissoes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function criar()
    {
        return view('admin.permissao.criar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function salvar(ValidarPermissao $request)
    {
        Permissao::create($request->all());
        return redirect('admin/permissao/criar')->with('mensagem', 'Permissão criada com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function mostrar($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editar($id)
    {
        $data = Permissao::findOrFail($id);
        return view('admin.permissao.editar', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function atualizar(ValidarPermissao $request, $id)
    {
        Permissao::findOrFail($id)->update($request->all());
        return redirect('admin/permissao')->with('mensagem', 'Permissão atualizada com sucesso');
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
            if (Permissao::destroy($id)) {
                return response()->json(['mensagem' => 'ok']);
            } else {
                return response()->json(['mensagem' => 'ng']);
            }
        } else {
            abort(404);
        }
    }
}
