<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Post extends Model
{
    use HasFactory;

    use HasTranslations;

    protected function asJson($value)
    {
        return json_encode($value, JSON_UNESCAPED_UNICODE);
    }
    protected $guarded=[];
    public $translatable=['title'];

    public function Images(){

        if ($this->images){
           return  asset('assets/images/posts/'.$this->images);
        }else{
            return asset('assets/logo.png');

        }
    }
}
