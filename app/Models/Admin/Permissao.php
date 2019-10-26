<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Permissao extends Model
{
    protected $table = "permissao";
    protected $fillable = ['nome', 'filtro'];
    protected $guarded = ['id'];
    
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'permissao_role', 'permissao_id', 'role_id');
    }
}
