@extends("theme.$theme.layout")
@section('titulo')
    Permissões
@endsection

@section('conteudo')
    <div class="row">
        <div class="col-lg-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Permissões</h3>
                </div>
                <div class="box-body table-responsive no-padding">
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>Filtro</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($permissoes as $permissao)
                                    <tr>
                                        <td>{{$permissao->id}}</td>
                                        <td>{{$permissao->nome}}</td>
                                        <td>{{$permissao->filtro}}</td>
                                        <td></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
@endsection