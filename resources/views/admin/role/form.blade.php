<div class="form-group">
    <label for="nome" class="col-lg-3 control-label requerido">Nome</label>
    <div class="col-lg-8">
        <input type="text" name="nome" id="nome" class="form-control" value="{{old('nome', $data->nome ?? '')}}" required/>

    </div>
</div>