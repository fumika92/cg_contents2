<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\PostRequest;
use illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    
//ホーム画面を移す
    public function index(Post $post)
    {
        $categories = DB::table('categories')->get();
        
        return view('contents/index')->with([
            'posts' => $post->getPaginateByLimit(),
            'categories' => $categories,
        ]);
    }
//投稿の詳細画面に移動
    public function show(Post $post)
    {
        $user = Auth::user();
        $post->load('comments');
        $post->load('category');
        $categories = DB::table('categories')->get();
        
        return view('contents/show')->with(['post' => $post, 'user' => $user, 'categories' => $categories]);
    }
//作成画面に移動
    public function create()
    {
        $categories = DB::table('categories')->get();
        return view('contents/create')->with(['categories' => $categories]);
    }
//編集画面に移動
    public function edit(Post $post)
    {
        return view('contents/edit')->with(['post' => $post]);
    }
//編集データをDBに送信→詳細画面に反映＆移動
    public function update(PostRequest $request, Post $post)
    {
        $input_post = $request['post'];
        $image = $request->file('image');
        //バケットの'fumika01'フォルダへアップロード
        $path = Storage::disk('s3')->putFile('/contents/image', $image, 'public');
        //アップロードした画像のフルパスを取得
        $url = Storage::disk('s3')->url($path);
        
        $input_post += ['user_id' => $request->user()->id, 'image_path' => $url];
        $post->fill($input_post)->save();
        $categories = DB::table('categories')->get();
        
        return redirect('contents/' . $post->id)->with(['post' => $post, 'categories' => $categories]);
    }
    
    
//消去してホーム画面に移動
    public function delete(Post $post)
    {
        $post->delete();
        return redirect('/');
    }
    
//作成データをDBに飛ばすコントローラー
    public function store(PostRequest $request, Post $post)
    {
        $data_title = $request['post.title'];
        $data_body = $request['post.body'];
        $category = $request['post.category_id'];
        $image = $request->file('image');
        $user_id = $request->user()->id;
        
        //画像がアップロードされていればStorageに保存
        if ($request->hasFile('image')) {
            //バケットの'fumika01'フォルダへアップロード
            $path = Storage::disk('s3')->putFile('/contents/image', $image, 'public');
            //アップロードした画像のフルパスを取得
            $url = Storage::disk('s3')->url($path);
        } else {
            $path = null;
            $url = null;
        }
        
        //データをデータベースに入れる
        $post->fill([
            'title' => $data_title,
            'body' => $data_body,
            'image_path' => $url,
            'user_id' => $user_id,
            'category_id' => $category,
        ])->save();
        
        $categories = DB::table('categories')->get();
        
        return redirect('contents/' . $post->id)->with(['categories' => $categories]);
    }
    
    
    //サイトaboutページに飛ぶ
    public function webAbout(Post $post)
    {
        $categories = DB::table('categories')->get();
        return view('contents/about')->with(['post' => $post, 'categories' => $categories]);
    }
}

?>