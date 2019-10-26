<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Permissao extends Model
{
    protected $table = "permissao";
    protected $fillable = ['nome', 'filtro'];
    protected $guarded = ['id'];
}
