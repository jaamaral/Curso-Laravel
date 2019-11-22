@extends("theme.$theme.layout")
@section('titulo')
Livros
@endsection

@section("styles")
<link href="{{asset("assets/js/bootstrap-fileinput/css/fileinput.min.css")}}" rel="stylesheet" type="text/css"/>
@endsection

@section("scriptsPlugins")
<script src="{{asset("assets/js/bootstrap-fileinput/js/fileinput.min.js")}}" type="text/javascript"></script>
<script src="{{asset("assets/js/bootstrap-fileinput/js/locales/es.js")}}" type="text/javascript"></script>
<script src="{{asset("assets/js/bootstrap-fileinput/themes/fas/theme.min.js")}}" type="text/javascript"></script>
@endsection

@section("scripts")
<script src="{{asset("assets/pages/scripts/livro/criar.js")}}" type="text/javascript"></script>
@endsection

@section('conteudo')
<div class="row">
    <div class="col-lg-12">
        @include('includes.mensagem')
        @include('includes.form-error')
        <div class="box box-danger">
            <div class="box-header with-border">
                <h3 class="box-title">Editar Livro {{$data->titulo}}</h3>
                <a href="{{route('livro')}}" class="btn btn-info btn-sm pull-right">Lista</a>
            </div>
            <form action="{{route('atualizar_livro', $data->id)}}" id="form-geral" class="form-horizontal" method="POST" autocomplete="off" enctype="multipart/form-data">
                @csrf @method("put")
                <div class="box-body">
                    @include('livro.form')
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