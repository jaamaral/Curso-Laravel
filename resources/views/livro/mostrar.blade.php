<div>{{$livro->titulo}}</div>
<div>{{$livro->isbn}}</div>
<div>{{$livro->autor}}</div>
<div><img src="{{Storage::url("imagens/fotos/$livro->foto")}}" alt="Imagem do Livro"></div>