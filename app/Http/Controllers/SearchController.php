<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;

use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
        //検索
    public function search(Request $request)
    {
        $search = $request['nav_search']; //検索の値
        $category = $request['nav_category']; //カテゴリの値
        
        $query = Post::query();
        //検索に値が代入されていたら、$post_searchに代入
        if (empty($search)) {
            $posts_search = '';
        }else {
            $query->where('title', 'LIKE', "%$search%")
                ->orWhere('body', 'LIKE', "%$search%");
            $posts_search = $query->get();
        }
        
        //カテゴリーに然るべき値が入っていたら、$post_categoryに代入
        if ($category == '1' || $category == '2' || $category == '8' || $category == '15') {
            $posts_category = '';
        }else {
            $posts_category = DB::table('posts')->where('category_id', $category)->get();
        }
        
        $categories = DB::table('categories')->get();
        
        return view('categories/search')->with([
            'categories' => $categories,
            'posts_search' => $posts_search,
            'posts_category' => $posts_category,
        ]);
    }
    
    public function category(Request $request)
    {
        $category = $request['category_id'];
        $posts_category = DB::table('posts')->where('category_id', $category)->get();
        
        $categories = DB::table('categories')->get();
        
        $posts_search = '';
        
        return view('categories/search')->with([
            'categories' => $categories,
            'posts_search' => $posts_search,
            'posts_category' => $posts_category,
        ]);
    }
}
