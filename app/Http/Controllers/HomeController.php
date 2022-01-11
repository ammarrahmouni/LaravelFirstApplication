<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends MainController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
        $categories = Category::select('id', 'name_' . app()->getLocale() . ' as name')->get();
        $this->data_category['categories'] = $categories;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $posts = Post::with(['users' => function($q){
            $q->select('id', 'name', 'image');
        }, 'categoryes' => function($q){
            $q->select('id', 'name_' . app()->getLocale() . ' as name');
        }])->select('id', 'image', 'user_id', 'category_id', 'created_at')->latest()->paginate(POST_NUMBER);

        $categories = Category::select('id', 'name_' . app()->getLocale() . ' as name')->get();

        if($request->ajax()){
            return [
                'posts' => view('post.post', compact('posts', 'categories'))->render(),
                'next_page' => $posts->nextPageUrl(),
            ];
        }

        return view('home', compact('posts', 'categories') );
    }




}
