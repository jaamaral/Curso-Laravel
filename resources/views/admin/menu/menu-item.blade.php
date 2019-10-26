@if ($item["submenu"] == [])
<li class="dd-item dd3-item" data-id="{{$item["id"]}}">
    <div class="dd-handle dd3-handle"></div>
    <div class="dd3-content {{$item["url"] == "javascript:;" ? "font-weight-bold" : ""}}">
        <a href="{{route("editar_menu", ['id' => $item["id"]])}}">{{$item["nome"] . " | Url -> " . $item["url"]}} Ícone -> <i style="font-size:20px;" class="fa fa-fw {{isset($item["icone"]) ? $item["icone"] : ""}}"></i></a>
        <a href="{{route('excluir_menu', ['id' => $item["id"]])}}" class="excluir-menu pull-right tooltipsC" title="Excluir este menu"><i class="text-danger fa fa-trash-o"></i></a>
    </div>
</li>
@else
<li class="dd-item dd3-item" data-id="{{$item["id"]}}">
    <div class="dd-handle dd3-handle"></div>
    <div class="dd3-content {{$item["url"] == "javascript:;" ? "font-weight-bold" : ""}}">
        <a href="{{route("editar_menu", ['id' => $item["id"]])}}">{{ $item["nome"] . " | Url -> " . $item["url"]}} Ícone -> <i style="font-size:20px;" class="fa fa-fw {{isset($item["icone"]) ? $item["icone"] : ""}}"></i></a>
        <a href="{{route('excluir_menu', ['id' => $item["id"]])}}" class="excluir-menu pull-right tooltipsC" title="Excluir este menu"><i class="text-danger fa fa-trash-o"></i></a>
    </div>
    <ol class="dd-list">
        @foreach ($item["submenu"] as $submenu)
        @include("admin.menu.menu-item",[ "item" => $submenu ])
        @endforeach
    </ol>
</li>
@endif