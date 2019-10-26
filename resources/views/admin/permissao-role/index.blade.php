@extends("theme.$theme.layout")
@section("titulo")
Permissão - Função
@endsection

@section("scripts")
<script src="{{asset("assets/pages/scripts/admin/permissao-role/index.js")}}" type="text/javascript"></script>
@endsection

@section('conteudo')
<div class="row">
    <div class="col-lg-12">
        @include('includes.mensagem')
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Menus - Função</h3>
            </div>
            <div class="box-body">
                @csrf
                <table class="table table-striped table-bordered table-hover" id="tabela-dados">
                    <thead>
                        <tr>
                            <th>Permissão</th>
                            @foreach ($roles as $id => $nome)
                            <th class="text-center">{{$nome}}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($permissoes as $key => $permissao)
                            <tr>
                                <td class="font-weight-bold">{{$permissao["nome"]}}</td>
                                @foreach($roles as $id => $nome)
                                    <td class="text-center">
                                        <input
                                        type="checkbox"
                                        class="permissao_role"
                                        name="permissao_role[]"
                                        data-permissaoid={{$permissao[ "id"]}}
                                        value="{{$id}}" {{in_array($id, array_column($permissoesRoles[$permissao["id"]], "id"))? "checked" : ""}}>
                                    </td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection