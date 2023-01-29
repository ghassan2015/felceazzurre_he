<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Product extends Model
{
    use HasFactory;
    use HasTranslations;


    protected $guarded=[];
    public $translatable = ['name','smell_product','fragrance','formula','meta_description','size','slug'];
    protected function asJson($value)
    {
        return json_encode($value, JSON_UNESCAPED_UNICODE);
    }
    public function category(){
        return $this->belongsTo(Category::class,'category_id','id');
    }



}
