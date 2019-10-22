@extends("theme.$theme.layout")
@section("titulo")
Menu - Função
@endsection

@section("scripts")
<script src="{{asset("assets/pages/scripts/admin/menu-role/index.js")}}" type="text/javascript"></script>
@endsection

@section('conteudo')
<div class="row">
    <div class="col-lg-12">
        @include('includes.mensagem')
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Menus - Funções</h3>
            </div>
            <div class="box-body">
                @csrf
                <table class="table table-striped table-bordered table-hover" id="tabela-dados">
                    <thead>
                        <tr>
                            <th>Menu</th>
                            @foreach ($roles as $id => $nome)
                            <th class="text-center">{{$nome}}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($menus as $key => $menu)
                        @if ($menu["menu_id"] != 0)
                            @break
                        @endif
                            <tr>
                                <td class="font-weight-bold"><i class="fa fa-arrows-alt"></i> {{$menu["nome"]}}</td>
                                @foreach($roles as $id => $nome)
                                    <td class="text-center">
                                        <input
                                        type="checkbox"
                                        class="menu_role"
                                        name="menu_role[]"
                                        data-menuid={{$menu[ "id"]}}
                                        value="{{$id}}" {{in_array($id, array_column($menusRoles[$menu["id"]], "id"))? "checked" : ""}}>
                                    </td>
                                @endforeach
                            </tr>
                            @foreach($menu["submenu"] as $key => $filho)
                                <tr>
                                    <td class="pl-30"><i class="fa fa-arrow-right"></i> {{ $filho["nome"] }}</td>
                                    @foreach($roles as $id => $nome)
                                        <td class="text-center">
                                            <input
                                            type="checkbox"
                                            class="menu_role"
                                            name="menu_role[]"
                                            data-menuid={{$filho[ "id"]}}
                                            value="{{$id}}" {{in_array($id, array_column($menusRoles[$filho["id"]], "id"))? "checked" : ""}}>
                                        </td>
                                    @endforeach
                                </tr>
                                @foreach ($filho["submenu"] as $key => $filho2)
                                    <tr>
                                        <td class="pl-50"><i class="fa fa-arrow-right"></i> {{$filho2["nome"]}}</td>
                                        @foreach($roles as $id => $nome)
                                            <td class="text-center">
                                                <input
                                                type="checkbox"
                                                class="menu_role"
                                                name="menu_role[]"
                                                data-menuid={{$filho2[ "id"]}}
                                                value="{{$id}}" {{in_array($id, array_column($menusRoles[$filho2["id"]], "id"))? "checked" : ""}}>
                                            </td>
                                        @endforeach
                                    </tr>
                                    @foreach ($filho2["submenu"] as $key => $filho3)
                                        <tr>
                                            <td class="pl-70"><i class="fa fa-arrow-right"></i> {{$filho3["nome"]}}</td>
                                            @foreach($roles as $id => $nome)
                                            <td class="text-center">
                                                <input
                                                type="checkbox"
                                                class="menu_role"
                                                name="menu_role[]"
                                                data-menuid={{$filho3[ "id"]}}
                                                value="{{$id}}" {{in_array($id, array_column($menusRoles[$filho3["id"]], "id"))? "checked" : ""}}>
                                            </td>
                                            @endforeach
                                        </tr>
                                        @foreach ($filho3["submenu"] as $key => $filho4)
                                        <tr>
                                            <td class="pl-90"><i class="fa fa-arrow-right"></i> {{$filho4["nome"]}}</td>
                                            @foreach($roles as $id => $nome)
                                            <td class="text-center">
                                                <input
                                                type="checkbox"
                                                class="menu_role"
                                                name="menu_role[]"
                                                data-menuid={{$filho4[ "id"]}}
                                                value="{{$id}}" {{in_array($id, array_column($menusRoles[$filho4["id"]], "id"))? "checked" : ""}}>
                                            </td>
                                            @endforeach
                                        </tr>
                                        @endforeach
                                    @endforeach
                                @endforeach
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div> 
@endsection 