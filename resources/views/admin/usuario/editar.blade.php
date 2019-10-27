@extends("theme.$theme.layout")
@section('titulo')
    Usuários
@endsection

@section("scripts")
<script src="{{asset("assets/pages/scripts/admin/usuario/criar.js")}}" type="text/javascript"></script>
@endsection

@section('conteudo')
<div class="row">
    <div class="col-lg-12">
        @include('includes.form-error')
        @include('includes.mensagem')
        <div class="box box-danger">
            <div class="box-header with-border">
                <h3 class="box-title">Editar Usuário {{$data->nome}}</h3>
                <div class="box-tools pull-right">
                    <a href="{{route('usuario')}}" class="btn btn-block btn-info btn-sm">
                        <i class="fa fa-fw fa-reply-all"></i> Lista
                    </a>
                </div>
            </div>
            <form action="{{route('atualizar_usuario', ['id' => $data->id])}}" id="form-geral" class="form-horizontal" method="POST" autocomplete="off">
                @csrf @method("put")
                <div class="box-body">
                    @include('admin.usuario.form')
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