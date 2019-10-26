@extends("theme.$theme.layout")
@section('titulo')
    Permissões
@endsection

@section("scripts")
<script src="{{asset("assets/pages/scripts/admin/permissao/criar.js")}}" type="text/javascript"></script>
@endsection

@section('conteudo')
<div class="row">
    <div class="col-lg-12">
        @include('includes.mensagem')
        <div class="box box-danger">
            <div class="box-header with-border">
                <h3 class="box-title">Editar Permissões {{$data->nome}}</h3>
                <a href="{{route('permissao')}}" class="btn btn-info btn-sm pull-right">Lista</a>
            </div>
            <form action="{{route('atualizar_permissao', ['id' => $data->id])}}" id="form-geral" class="form-horizontal" method="POST" autocomplete="off">
                @csrf @method("put")
                <div class="box-body">
                    @include('admin.permissao.form')
                </div>
                <div class="box-footer">
                    <div class="col-lg-3"></div>
                    <div class="col-lg-6">
                        @include('includes.botao-form-editar')
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection