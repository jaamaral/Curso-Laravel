<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class Livro extends Model
{
    protected $table = "livro";
    protected $fillable = ['titulo', 'isbn', 'autor', 'quantidade', 'editorial', 'foto'];
    protected $guarded = ['id'];


    //armazenar foto em disco público local
    public static function setFoto($foto, $atual = false){
        if ($foto) {
            if ($atual) {
                Storage::disk('public')->delete("imagens/fotos/$atual");
            }
            $imageName = Str::random(20) . '.jpg';
            $imagem = Image::make($foto)->encode('jpg', 75);
            $imagem->resize(530, 470, function ($constraint) {
                $constraint->upsize();
            });
            Storage::disk('public')->put("imagens/fotos/$imageName", $imagem->stream());
            return $imageName;
        } else {
            return false;
        }
    }
    
}
