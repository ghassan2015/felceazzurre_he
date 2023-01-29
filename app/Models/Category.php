<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Category extends Model
{
    use HasFactory;
    use HasTranslations;
    protected $guarded=[];

    public $translatable = ['title','slug'];


    protected function asJson($value)
    {
        return json_encode($value, JSON_UNESCAPED_UNICODE);
    }
    public function user(){
        return $this->belongsTo(\App\Models\User::class);
    }
    public function images(){
        if(isset($this->image)) {
            return asset("assets/images/categories/" . $this->image);

        }else {
            return env('DEFAULT_IMAGE');

        }
        }

    public function blueImageIcon()
    {
        if ($this->icon_image_blue == null) {
            return env('DEFAULT_IMAGE');
        } else {
            return asset("assets/images/categories/" . $this->icon_image_blue);
        }
    }
    public function whiteImageIcon(){
        if($this->icon_image_white==null) {
            return env('DEFAULT_IMAGE');
        } else{
            return asset("assets/images/categories/".$this->icon_image_white);

        }
    }
    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id','id');
    }
    public function scopeSelection($q){
        $q->select('id','title');
    }



    public function product(){
        return $this->hasMany(Product::class,'category_id','id');
    }

    public function scopeSlug($query,$item){
        return( $query->where('slug','like','%'.$item.'%'));

    }





}
