<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\PostRequest;
use illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    
//ホーム画面を移す
    public function index(Post $post)
    {
        return view('contents/index')->with(['posts' => $post->getPaginateByLimit()]);
    }
//投稿の詳細画面に移動
    public function show(Post $post)
    {
        return view('contents/show')->with(['post' => $post]);
    }
//作成画面に移動
    public function create()
    {
        return view('contents/create');
    }
//編集画面に移動
    public function edit(Post $post)
    {
        if(Auth::id() !== $post->user_id){
            return redirect('contents/' . $post->id);
        }
        return view('contents/edit')->with(['post' => $post]);
    }
//編集データをDBに送信→詳細画面に反映＆移動
    public function update(PostRequest $request, Post $post)
    {
        $input_post = $request['post'];
        $input_post += ['user_id' => $request->user()->id];
        $image = $request->file('image');
        
        //画像がアップロードされていればStorageに保存
        if($request->hasFile('image')){
            //バケットの'fumika01'フォルダへアップロード
            $path = Storage::disk('s3')->putFile('/post', $image, 'public');
            //アップロードした画像のフルパスを取得
            $url = Storage::disk('s3')->url($path);
        }else{
            $url = null;
        }
        
        $input_post += ['image_path' => $url];
        
        $post->fill($input_post)->save();
        return redirect('contents/' . $post->id);
    }
    
    
//消去してホーム画面に移動
    public function delete(Post $post)
    {
        if(Auth::id() !== $post->user_id){
            return redirect('contents/' . $post->id);
        }
        $post->delete();
        return redirect('/');
    }
    
//作成データをDBに飛ばすコントローラー
    public function store(PostRequest $request, Post $post)
    {
        $data_title = $request['post.title'];
        $data_body = $request['post.body'];
        $image = $request->file('image');
        $user_id = $request->user()->id;
        
        //画像がアップロードされていればStorageに保存
        if($request->hasFile('image')){
            //バケットの'fumika01'フォルダへアップロード
            $path = Storage::disk('s3')->putFile('/', $image, 'public');
            //アップロードした画像のフルパスを取得
            $url = Storage::disk('s3')->url($path);
        }else{
            $url = null;
        }
        //データをデータベースに入れる
        $post->fill([
            'title' => $data_title,
            'body' => $data_body,
            'image_path' => $url,
            'user_id' => $user_id,
            ])->save();
        
        return redirect('/contents/' . $post->id);
    }
    

    
    //user
    //ユーザーページに飛ぶ
    public function about(Post $post)
    {
        return view('contents/edit')->with(['post' => $post]);
    }
}

?>