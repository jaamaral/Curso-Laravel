<div>{{$livro->titulo}}</div>
<div>{{$livro->isbn}}</div>
<div>{{$livro->autor}}</div>
<div><img src="{{$livro->foto}}" alt="Imagem do Livro"></div>

<!--Código utilizado quando é para mostrar imagem armazenada em disco público local
    <div><img src="/*Storage::url("imagens/fotos/$livro->foto")*/}}" alt="Imagem do Livro"></div>-->