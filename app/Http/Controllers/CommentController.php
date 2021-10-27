<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class CommentController extends Controller
{
    public function store()
    {
        $post->users()->attach(Auth::id()); //attach()メソッドで中間テーブルにレコードを挿入する
        
        return redirect('contents/' . $post->id);
    }
}
