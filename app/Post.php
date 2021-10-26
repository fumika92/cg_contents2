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
    
    public function getPaginateByLimit(int $limit_count = 10)
    {
        // updated_atで降順に並べた後、limitで件数制限をかける
        return $this->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
    
    //Userに対するリレーション
    //一対多なので'user'は単数形
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    //多対多のリレーション
    public function users()
    {
        return $this->belongsToMany('App\User')->withTimestamps(); //withTimestampsで中間テーブルのタイムスタンプを自動的に保守する
    }
}
