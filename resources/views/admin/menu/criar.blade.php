@extends("theme.$theme.layout")
@section('titulo')
    Sistema Menus
@endsection

@section('conteudo')
    <div class="row">
        <div class="col-lg-12">
            @include('includes.form-error')
            @include('includes.mensagem')
            <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">Criar Menus</h3>
                </div>
                <form action="{{route('salvar_menu')}}" id="form-geral" class="form-horizontal" method="POST">
                    @csrf
                    <div class="box-body">
                        @include('admin.menu.form')
                    </div>
                    <div class="box-footer">
                        <div class="col-lg-3"></div>
                        <div class="col lg 6">
                            @include('includes.botao-form-criar')
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection