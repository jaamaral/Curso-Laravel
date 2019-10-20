<div class="form-group">
    <label for="nome" class="col-lg-3 control-label requerido">Nome</label>
    <div class="col-lg-8">
        <input type="text" name="nome" id="nome" class="form-control" value="{{old('nome')}}" required>
    </div>
</div>
<div class="form-group">
    <label for="url" class="col-lg-3 control-label requerido">URL</label>
    <div class="col-lg-8">
        <input type="text" name="url" id="url" class="form-control" value="{{old('url')}}" required>
    </div>
</div>
<div class="form-group">
    <label for="icone" class="col-lg-3 control-label">Icone</label>
    <div class="col-lg-8">
        <input type="text" name="icone" id="icone" class="form-control" value="{{old('icone')}}">
    </div>
    <div class="col-lg-1">
        <span id="mostrar-icone" class="fa fa-fw {{old("icone")}}"></span>
    </div>
</div>