<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Post;
use App\Category;

class PageController extends Controller
{
    public function blog(Request $request){
        $categories = Category::all();
        $search = $request->get('search');
        
        $posts = Post::orderBy('id', 'DESC')->where('status', 'PUBLISHED')->search($search)->paginate(6);
        return view('web.posts', ['posts' => $posts, 'categories' => $categories]);
    }


    public function category($slug){
        $categories = Category::all();
        $category = Category::where('slug', $slug)->pluck('id')->first(); //Pluck return just the id
        $posts = Post::where('category_id', $category)
            ->orderBy('id', 'DESC')->where('status', 'PUBLISHED')->paginate();

        return view('web.posts', ['posts' => $posts, 'categories' => $categories]);
    }

    public function post($slug){
        $post = Post::where('slug', $slug)->first();
        return view('web.post', ['post' => $post]);
    }

    public function tag($slug){
        $categories = Category::all();
        $posts = Post::whereHas('tags', function($query) use($slug){
            $query->where('slug', $slug);
        })
        ->orderBy('id', 'DESC')->where('status', 'PUBLISHED')->paginate();

        return view('web.posts', ['posts' => $posts, 'categories' => $categories]);
    }
}
