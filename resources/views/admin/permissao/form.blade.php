<div class="form-group">
    <label for="nome" class="col-lg-3 control-label requerido">Nome</label>
    <div class="col-lg-8">
    <input type="text" name="nome" id="nome" class="form-control" value="{{old('nome', $data->nome ?? '')}}" required/>
    </div>
</div>
<div class="form-group">
    <label for="filtro" class="col-lg-3 control-label requerido">Filtro</label>
    <div class="col-lg-8">
    <input type="text" name="filtro" id="filtro" class="form-control" value="{{old('filtro', $data->filtro ?? '')}}" required/>
    </div>
</div>