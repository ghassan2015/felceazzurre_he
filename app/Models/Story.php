<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Story extends Model
{
    use HasFactory;
    use HasFactory;
    use HasTranslations;

    protected function asJson($value)
    {
        return json_encode($value, JSON_UNESCAPED_UNICODE);
    }
    protected $guarded=[];
    public $translatable = ['title','sub_title','description'];

    public function story_constant_cd() {
        return $this->belongsTo(Constant::class, "story_cd", "id");
    }
}
