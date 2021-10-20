<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    
    use SoftDeletes;
    
    protected $fillable = [
        'title',
        'body',
        'image_path',
        'user_id',
    ];
    
    //Userに対するリレーション
    //一対多なので'user'は単数形
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
