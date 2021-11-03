<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use Illuminate\Http\Request;
use App\Comment;
use App\Post;
use illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, Comment $comment, Post $post)
    {
        $body = $request['comment.body'];
        $user_id = Auth::id();
        $post_id = $request['post_id'];
        
        $comment->fill([
            'body' => $body,
            'user_id' => $user_id,
            'post_id' => $post_id,
        ])->save();
        
        return redirect('contents/' . $post->id);
    }
    
    public function delete(Request $request, Comment $comment, Post $post)
    {
        $comment_id = $request['comment_id'];
        $comment = comment::find($comment_id);
        
        $comment->delete();
        return redirect('contents/' . $post->id);
    }
}
