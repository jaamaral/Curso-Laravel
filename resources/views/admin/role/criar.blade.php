@extends("theme.$theme.layout")
@section('titulo')
    Perfis
@endsection

@section('scripts')
    <script src="{{asset("assets/pages/scripts/admin/criar.js")}}" type="text/javascript"></script>
@endsection

@section('conteudo')
    <div class="row">
        <div class="col-lg-12">
            @include('includes.form-error')
            @include('includes.mensagem')
            <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">Criar Perfis</h3>
                  <div class="box-tools pull-right">
                      <a href="{{route('role')}}" class="btn btn-block btn-info btn-sm">
                        <i class="fa fa-fw fa-reply-all"></i>Voltar à lista
                      </a>
                  </div>
                </div>
                <form action="{{route('salvar_role')}}" id="form-geral" class="form-horizontal" method="POST" autocomplete="off">
                    @csrf
                    <div class="box-body">
                        @include('admin.role.form')
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