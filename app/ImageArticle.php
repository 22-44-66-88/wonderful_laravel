<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImageArticle extends Model
{
    public function article(){
        return $this->belongsTo(Article::class);
    }
}
