<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Auth;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'body', 'image_path',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function getOwnPaginateByLimit(int $limit_count = 10)
    {
        // updated_atで降順に並べた後、limitで件数制限をかける
        return $this::with('posts')->find(Auth::id())->posts()->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
    
    //Postに対するリレーション
    //一対多なので'posts'と複数形に
    public function posts()
    {
        return $this->hasMany('App\Post');
    }
    
    //多対多のリレーション
    public function likes()
    {
        return $this->belongsToMany('App\Post');
    }
}
