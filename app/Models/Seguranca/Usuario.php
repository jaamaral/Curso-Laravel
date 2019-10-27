<?php

namespace App\Models\Seguranca;

use App\Models\Admin\Role;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class Usuario extends Authenticatable
{
    protected $remember_token = false;
    protected $table = 'usuario';
    protected $fillable = ['usuario', 'nome', 'email', 'password'];

    public function roles()
    {
        return $this->belongsToMany(Role::class,'usuario_role');
    }

    public function setSession($roles)
    {
        if (count($roles) == 1){
            Session::put([
                'role_id' => $roles[0]['id'],
                'role_nome' => $roles[0]['nome'],
                'usuario' => $this->usuario,
                'usuario_id' => $this->id,
                'nome_usuario' => $this->nome
            ]);
        } 
    }
    
    public function setPasswordAttribute($pass)
    {
        $this->attributes['password'] = Hash::make($pass);
    }
}
