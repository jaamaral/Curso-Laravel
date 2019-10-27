<div class="form-group">
    <label for="nome" class="col-lg-3 control-label requerido">Nome</label>
    <div class="col-lg-8">
        <input type="text" name="nome" id="nome" class="form-control" value="{{old('nome', $data->nome ?? '')}}" required/>
    </div>
</div>
<div class="form-group">
    <label for="usuario" class="col-lg-3 control-label requerido">Usuário</label>
    <div class="col-lg-8">
        <input type="text" name="usuario" id="usuario" class="form-control" value="{{old('usuario', $data->usuario ?? '')}}" required/>
    </div>
</div>
<div class="form-group">
    <label for="email" class="col-lg-3 control-label requerido">E-Mail</label>
    <div class="col-lg-8">
        <input type="email" name="email" id="email" class="form-control" value="{{old('email', $data->email ?? '')}}" required/>
    </div>
</div>
<div class="form-group">
    <label for="password" class="col-lg-3 control-label {{!isset($data) ? 'requerido' : ''}}">Senha</label>
    <div class="col-lg-8">
        <input type="password" name="password" id="password" class="form-control" value="" {{!isset($data) ? 'required' : ''}} minlength="5"/>
    </div>
</div>
<div class="form-group">
    <label for="re_password" class="col-lg-3 control-label {{!isset($data) ? 'requerido' : ''}}">Repita Senha</label>
    <div class="col-lg-8">
        <input type="password" name="re_password" id="re_password" class="form-control" value="" {{!isset($data) ? 'required' : ''}} minlength="5"/>
    </div>
</div>
<div class="form-group">
    <label for="role_id" class="col-lg-3 control-label requerido">Função</label>
    <div class="col-lg-8">
        <select name="role_id[]" id="role_id" class="form-control" multiple required>
            <option value="">Selecione a Função</option>
            @foreach($roles as $id => $nome)
                <option
                value="{{$id}}"
                {{is_array(old('role_id')) ? (in_array($id, old('role_id')) ? 'selected' : '')  : (isset($data) ? ($data->roles->firstWhere('id', $id) ? 'selected' : '') : '')}}
                >
                {{$nome}}
                </option>
            @endforeach
        </select>
    </div>
</div>