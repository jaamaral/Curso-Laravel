<?php

namespace App\Models\Seguranca;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    protected $remember_token = false;
    protected $table = 'usuario';
    protected $fillable = ['usuario', 'nome', 'password'];
    protected $guarded = ['id'];
}
