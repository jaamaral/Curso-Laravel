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


    //armazenar foto no dropbox
    public static function setFoto($foto, $atual = false){
        if ($foto) {
            if ($atual) {
                Storage::disk('dropbox')->delete("imagens/fotos/$atual");
            }
            $imageName = Str::random(20) . '.jpg';
            $imagem = Image::make($foto)->encode('jpg', 75);
            $imagem->resize(530, 470, function ($constraint) {
                $constraint->upsize();
            });
            Storage::disk('dropbox')->put("imagens/fotos/$imageName", $imagem->stream()->__toString());
            $dropbox = Storage::disk('dropbox')->getDriver()->getAdapter()->getClient();
            $response = $dropbox->createSharedLinkWithSettings("imagens/fotos/$imageName",["requested_visibility" => "public"]);
            return str_replace('dl=0', 'raw=1', $response['url']);
        } else {
            return false;
        }
    }
    
    //armazenar foto em disco público local
    /*public static function setFoto($foto, $atual = false){
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
    }*/
}
