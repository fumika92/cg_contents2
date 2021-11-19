<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'category_name',
    ];
    
    //カテゴリは複数の投稿を持っている
    public function posts()
    {
        return $this->hasMany(App\Post);
    }
}
