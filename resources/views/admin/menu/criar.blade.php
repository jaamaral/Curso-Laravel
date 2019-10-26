@extends("theme.$theme.layout")
@section('titulo')
    Sistema Menus
@endsection

@section('scripts')
    <script src="{{asset("assets/pages/scripts/admin/menu/criar.js")}}" type="text/javascript"></script>
@endsection

@section('conteudo')
    <div class="row">
        <div class="col-lg-12">
            @include('includes.form-error')
            @include('includes.mensagem')
            <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">Incluir Menu</h3>
                  <a href="{{route('menu')}}" class="btn btn-info btn-sm pull-right">Lista</a>
                </div>
                <form action="{{route('salvar_menu')}}" id="form-geral" class="form-horizontal" method="POST" autocomplete="off">
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