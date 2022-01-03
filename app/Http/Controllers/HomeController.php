<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::with(['users' => function($q){
            $q->select('id', 'name', 'image');
        }, 'categoryes' => function($q){
            $q->select('id', 'name_' . app()->getLocale() . ' as name');
        }])->select('id', 'image', 'user_id', 'category_id', 'created_at')->latest()->get();

        $categories = Category::select('id', 'name_' . app()->getLocale() . ' as name')->get();


        return view('home', compact('posts', 'categories'));
    }




}
