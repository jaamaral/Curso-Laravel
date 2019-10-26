@extends("theme.$theme.layout")
@section('titulo')
    Permissões
@endsection

@section("scripts")
<script src="{{asset("assets/pages/scripts/admin/index.js")}}" type="text/javascript"></script>
@endsection

@section('conteudo')
    <div class="row">
        <div class="col-lg-12">
            @include('includes.mensagem')
            <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Permissões</h3>
                  <a href="{{route('criar_permissao')}}" class="btn btn-success btn-sm pull-right">Incluir Permissão</a>
                </div>
                <div class="box-body table-responsive no-padding">
                        <table class="table table-striped table-bordered table-hover" id="tabela-dados">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>Filtro</th>
                                    <th class="width70"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($permissoes as $permissao)
                                    <tr>
                                        <td>{{$permissao->id}}</td>
                                        <td>{{$permissao->nome}}</td>
                                        <td>{{$permissao->filtro}}</td>
                                        <td>
                                            <a href="{{route("editar_permissao", ['id' => $permissao->id])}}" class="btn-acao-tabela tooltipsC" title="Editar este registro">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <form action="{{route("excluir_permissao",  ['id' => $permissao->id])}}" class="d-inline form-excluir" method="POST">
                                                @csrf @method("delete")
                                                <button type="submit" class="btn-acao-tabela excluir tooltipsC" title="Excluir este registro"><i class="fa fa-times-circle text-danger"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
@endsection