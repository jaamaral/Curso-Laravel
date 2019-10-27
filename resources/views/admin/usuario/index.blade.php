@extends("theme.$theme.layout")
@section('titulo')
Usuários
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
                <h3 class="box-title">Usuários</h3>
                <div class="box-tools pull-right">
                    <a href="{{route('criar_usuario')}}" class="btn btn-block btn-success btn-sm">
                        <i class="fa fa-fw fa-plus-circle"></i> Incluir Registro
                    </a>
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped table-bordered table-hover" id="tabela-dados">
                    <thead>
                        <tr>
                            <th>Usuário</th>
                            <th>Nome</th>
                            <th>Email</th>
                            <th class="width70"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datas as $data)
                        <tr>
                            <td>{{$data->usuario}}</td>
                            <td>{{$data->nome}}</td>
                            <td>{{$data->email}}</td>
                            <td>
                                <a href="{{route('editar_usuario', ['id' => $data->id])}}" class="btn-accion-tabla tooltipsC" title="Editar este registro">
                                    <i class="fa fa-fw fa-pencil"></i>
                                </a>
                                <form action="{{route('excluir_usuario', ['id' => $data->id])}}" class="d-inline form-excluir" method="POST">
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