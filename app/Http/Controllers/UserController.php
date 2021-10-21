<?php

namespace App\Http\Controllers;

use App\User;
use App\Post;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UserRequest;
use illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        return view('users/show')->with(['user' => $user]);
    }
    public function work(User $user)
    {
        $user = Auth::user();
        return view('Users/work')->with(['user' => $user]);
    }
    
    
    public function edit()
    {
        $user = Auth::user();
        return view('users/edit')->with(['user' => $user]);
    }
    public function update(UserRequest $request, User $user)
    {
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
        return redirect('users/' . $user->id);
    }
}
