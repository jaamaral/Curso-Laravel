<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    protected $table = "livro";
    protected $fillable = ['titulo', 'isbn', 'autor', 'quantidade', 'editorial', 'foto'];
    protected $guarded = ['id'];
}
