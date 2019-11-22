<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidacaoLivro;
use Illuminate\Http\Request;
use App\Models\Livro;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;


class LivroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        can('listar-livros');
        $datas = Livro::orderBy('id')->get();
        return view('livro.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function criar()
    {
        can('criar-livros');
        return view('livro.criar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function salvar(ValidacaoLivro $request)
    {
        if ($foto = Livro::setFoto($request->foto_up))
            $request->request->add(['foto' => $foto]);
        Livro::create($request->all());
        return redirect()->route('livro')->with('mensagem', 'Livro criado com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function mostrar(Request $request, Livro $livro)
    {
        if ($request->ajax()) {
            return view('livro.mostrar', compact('livro'));
        } else {
            abort(404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editar($id)
    {
        
        $data = Livro::findOrFail($id);
        return view('livro.editar', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function atualizar(ValidacaoLivro $request, $id)
    {
        $livro = Livro::findOrFail($id);
        if ($foto = Livro::setFoto($request->foto_up, $livro->foto))
            $request->request->add(['foto' => $foto]);
        $livro->update($request->all());
        return redirect()->route('livro')->with('mensagem', 'O livro foi atualizado');
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
            $livro = Livro::findOrFail($id);
            if (Livro::destroy($id)) {
                Storage::disk('public')->delete("imagens/fotos/$livro->foto");
                return response()->json(['mensagem' => 'ok']);
            } else {
                return response()->json(['mensagem' => 'ng']);
            }
        } else {
            abort(404);
        }
    }
}
