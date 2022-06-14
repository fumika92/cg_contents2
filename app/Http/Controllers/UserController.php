<?php

namespace App\Http\Controllers;

use App\User;
use App\Post;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UserRequest;
use illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function show(User $user)
    {
        $categories = DB::table('categories')->get();
        $categories_model = DB::table('categories')->whereBetween('id', [3, 7])->get();
        $categories_anime = DB::table('categories')->whereBetween('id', [9, 14])->get();
        $categories_scr = DB::table('categories')->where('id', 16)->get();
        return view('users/show')->with([
            'user' => $user,
            'own_posts' => $user->getOwnPaginateByLimit(),
            'likes' => $user->getLikePaginateByLimit(), 
            'categories' => $categories,
            'categories_model' => $categories_model,
            'categories_anime' => $categories_anime,
            'categories_scr' => $categories_scr,
        ]);
    }
    
    
    public function edit(Post $post, User $user)
    {
            $user = Auth::user();
            return view('users/edit')->with(['user' => $user]);
    }
    public function update(UserRequest $request, User $user)
    {
        $user = Auth::user();
        $input_user = $request['user'];
        $image = $request->file('image');
        
        //画像がアップロードされていればStorageに保存
        if($request->hasFile('image')){
            //バケットの'fumika01'フォルダへアップロード
            $path = Storage::disk('s3')->putFile('/user', $image, 'public');
            //アップロードした画像のフルパスを取得
            $url = Storage::disk('s3')->url($path);
        }else{
            $url = null;
        }
        
        $input_user += ['image_path' => $url];
        
        $user->fill($input_user)->save();
        return redirect('users/' . $user->id)->with([
            'user' => $user
        ]);
    }
}
