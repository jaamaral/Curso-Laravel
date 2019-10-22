@extends("theme.$theme.layout")
@section('titulo')
Perfis
@endsection

@section("scripts")
<script src="{{asset("assets/pages/scripts/admin/index.js")}}" type="text/javascript"></script>
@endsection

@section('conteudo')
<div class="row">
    <div class="col-lg-12">
        @include('includes.mensagem')
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Perfis</h3>
                <div class="box-tools pull-right">
                    <a href="{{route('criar_role')}}" class="btn btn-block btn-success btn-sm">
                        <i class="fa fa-fw fa-plus-circle"></i> Novo Registro
                    </a>
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped table-bordered table-hover" id="tabela-dados">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th class="width70"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datas as $data)
                        <tr>
                            <td>{{$data->nome}}</td>
                            <td>
                                <a href="{{route('editar_role', ['id' => $data->id])}}" class="btn-acao-tabela tooltipsC" title="Editar este registro">
                                    <i class="fa fa-fw fa-pencil"></i>
                                </a>
                                <form action="{{route('excluir_role', ['id' => $data->id])}}" class="d-inline form-excluir" method="POST">
                                    @csrf @method("delete")
                                    <button type="submit" class="btn-acao-tabela excluir tooltipsC" title="Excluir este registro">
                                        <i class="fa fa-fw fa-trash text-danger"></i>
                                    </button>
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