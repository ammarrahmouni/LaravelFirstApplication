<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\PostTranslation;
use App\Http\Requests\PostRequest;
use Illuminate\Foundation\Auth\User;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;


define("POST_NUMBER", 3);

class PostController extends MainController
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified'])->except(['gusetUser']);

    }



    public function gusetUser()
    {
        $posts = Post::with(['users' => function ($q) {
            $q->select('id', 'name', 'image');
        }, 'categoryes' => function ($q) {
            $q->select('id', 'name_' . app()->getLocale() . ' as name');
        }])->select('id', 'image', 'user_id', 'category_id', 'created_at')->get();

        $categories = Category::select('id', 'name_' . app()->getLocale() . ' as name')->get();

        return view('user.gust_user', compact('posts', 'categories'));
    }

    // public function addPost()
    // {

    //     $categorys = Category::select('id', 'name_' . app()->getLocale() . ' as name')->get();
    //     return view('post.add_post', compact('categorys'));
    // }

    public function savePost(PostRequest $request, $user_id)
    {

 

        $user = User::findOrFail($user_id);
        if ($user) {
            $path = '';

            if ($request->hasFile('image')) {
                $path = $request->file('image')->store('');
                $request->file('image')->move('uploads/images', $path);
            }

            $post = new Post;

            $post->image = $path;
            $post->category_id = $request->category;
            $post->user_id = $user_id;

            // add foreach to language key
            $arrayOfLang = config('translatable.locales');
            $arrayLangLength = count($arrayOfLang);

            for ($i = 0; $i < $arrayLangLength; $i++) {

                $title = 'title_' .  $arrayOfLang[$i];
                $description = 'description_' . $arrayOfLang[$i];

                $filter_title = filter_var($title, FILTER_SANITIZE_STRING);
                $filter_description = filter_var($description, FILTER_SANITIZE_STRING);

                $post->fill([
                    $arrayOfLang[$i] => [
                        'title' => $request->$filter_title,
                        'description' => $request->$filter_description
                    ],
                ]);
            }

            $post->save();


            return response()->json([
                'status' => true,
                'msg' =>   __('home.post_saved'),
            ]);

        } else{
            return response()->json([
                'status' => false,
                'msg' => __('login.user_cant_found'),
            ]);
        }
    }

    public function showPost($user_id)
    {
        if($user_id == Auth::user()->id){
            $posts = Post::with(['categoryes' => function ($q) {
                $q->select('id', 'name_' . app()->getLocale() . ' as name');
            }])->select('id', 'image', 'category_id', 'user_id', 'created_at')->where('user_id', $user_id)->paginate(POST_NUMBER);
            $this->data['posts'] = $posts;
            
            $categories = Category::select('id', 'name_' . app()->getLocale() . ' as name')->get();
            return view('post.view_post', $this->data, compact('categories'));
        }
        else{
            return __('home.dont_have_premission');
        }


    }

    public function editPost($post_id)
    {
        $posts = Post::with(['categoryes' => function ($q) {
            $q->select('id', 'name_' . app()->getLocale() . ' as name');
        }])->findOrFail($post_id);
        // dd($posts->categoryes);
        $categoryId = $posts->category_id;
        $categories = Category::select('id', 'name_' . app()->getLocale() . ' as name')->get();


        return view('post.edit_post', compact('posts', 'categories'));
    }

    public function updatePost(PostRequest $request, $post_id)
    {

        $path = '';
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('');
            $request->file('image')->move('uploads/images', $path);
        }

        $posts = Post::find($post_id);
        $posts->update([
            'image'         => $path,
            'category_id'   => $request->category,
            'en' => [
                'title' => $request->title_en,
                'description' => $request->description_en
            ],
            'ar' => [
                'title' => $request->title_ar,
                'description' => $request->description_ar
            ],
            'tr' => [
                'title' => $request->title_tr,
                'description' => $request->description_tr
            ],

        ]);

        // return $request;
        $user = Post::with(['users' => function ($q) {
            $q->select('id');
        }])->find($post_id);

        $user_id = $user->users->id;

        return redirect()->route('show.post', $user_id)->with('update_post', __('home.update_post'));
    }

    public function deletePost($post_id)
    {

        $post = Post::find($post_id);

        if (!$post)
            return redirect()->back()->with('error_delete', __('home.error_delete'));

        $post->delete();
        return redirect()->back()->with('delete_post', __('home.delete_done'));
    }

    public function specificCategory($category_id)
    {
        $posts = Post::with(['categoryes' => function ($q) {
            $q->select('id', 'name_' . app()->getLocale() . " as name");
        }])->where('category_id', $category_id)->get();

        $categories = Category::select('id', 'name_' . app()->getLocale() . ' as name')->get();

        return view('post.specific_post', compact('posts', 'categories'));
    }

    public function allCategory()
    {
        $posts = Post::with(['categoryes' => function ($q) {
            $q->select('id', 'name_' . app()->getLocale() . " as name");
        }])->get();

        $categories = Category::select('id', 'name_' . app()->getLocale() . ' as name')->get();

        return view('post.specific_post', compact('posts', 'categories'));
    }
}
