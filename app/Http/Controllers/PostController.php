<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\PostTranslation;
use App\Http\Requests\PostRequest;
use Illuminate\Foundation\Auth\User;
use App\Http\Controllers\MainController;
use App\Http\Requests\PostUpdateRequest;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;




class PostController extends MainController
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified'])->except(['gusetUser', 'specificCategory']);
    }


    public function gusetUser(Request $request)
    {
        $posts = Post::with(['users' => function ($q) {
            $q->select('id', 'name', 'image');
        }, 'categoryes' => function ($q) {
            $q->select('id', 'name_' . app()->getLocale() . ' as name');
        }])->select('id', 'image', 'user_id', 'category_id', 'created_at')->paginate(POST_NUMBER);

        $categories = Category::select('id', 'name_' . app()->getLocale() . ' as name')->get();

        if($request->ajax()){
            return [
                'posts' => view('post.post', compact('posts'))->render(),
                'next_page' => $posts->nextPageUrl(),
            ];
        }

        return view('user.gust_user', compact('posts', 'categories'));
    }

    public function showPost($user_id)
    {
        if ($user_id == Auth::user()->id) {
            $posts = Post::with(['categoryes' => function ($q) {
                $q->select('id', 'name_' . app()->getLocale() . ' as name');
            }])->select('id', 'image', 'category_id', 'user_id', 'created_at')->where('user_id', $user_id)->latest()->orderBy('created_at')->paginate(POST_NUMBER);
            $this->data['posts'] = $posts;

            $categories = Category::select('id', 'name_' . app()->getLocale() . ' as name')->get();


            return view('post.view_post', $this->data, compact('categories'));
        } else {
            return redirect()->back()->with('dont_have_premission', __('home.dont_have_premission'));
        }
    }

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

                $post->fill([
                    $arrayOfLang[$i] => [
                        'title' => filter_var($request->$title, FILTER_SANITIZE_STRING),
                        'description' => filter_var($request->$description, FILTER_SANITIZE_STRING)
                    ],
                ]);
            }

            $post->save();

            $posts = Post::all();

            return response()->json([
                'status' => true,
                'msg' =>   __('home.post_saved'),
                'done' => __('home.done'),
                'image' => $path,
                'posts' => $posts,
            ]);
        } else {
            return response()->json([
                'status' => false,
                'msg' => __('login.user_cant_found'),
                'error' => __('home.error')
            ]);
        }
    }




    public function updatePost(PostUpdateRequest $request, $post_id, $user_id)
    {
        if ($user_id == Auth::user()->id) {

            $post = Post::findOrFail($post_id);

            $path = '';
            if ($request->hasFile('image')) {
                $path = $request->file('image')->store('');
                $request->file('image')->move('uploads/images', $path);
                $post->update([
                    'image'         => $path,
                ]);
            }


            // add foreach to language key
            $arrayOfLang = config('translatable.locales');
            $arrayLangLength = count($arrayOfLang);
      

            for ($i = 0; $i < $arrayLangLength; $i++) {

                $title = 'title_' .  $arrayOfLang[$i];
                $description = 'description_' . $arrayOfLang[$i];


                $post->update([
                    $arrayOfLang[$i] => [
                        'title' => filter_var($request->$title, FILTER_SANITIZE_STRING),
                        'description' => filter_var($request->$description, FILTER_SANITIZE_STRING)
                    ],
                ]);
            }


            $post->update([
                'category_id'   => $request->category,
            ]);

            $category = Category::select('id', 'name_' . app()->getLocale() . ' as name')->findOrFail($request->category);


            return response()->json([
                'status' => true,
                'msg' => __('home.update_post'),
                'done' => __('home.done'),
            ]);
        } else {
            return response()->json([
                'error' => __('home.error'),
                'msg'   => __('home.dont_have_premission'),
            ]);
        }
    }

    public function deletePost($post_id)
    {

        $post = Post::findOrFail($post_id);

        $post->delete();

        return response()->json([
            'status' => true,
            'msg' => __('home.delete_done'),
            'done' => __('home.done'),
        ]);
    }

    public function specificCategory(Request $request, $category_id)
    {
        $categories = Category::findOrFail($category_id);
        if ($categories) {
            $posts = Post::with(['categoryes' => function ($q) {
                $q->select('id', 'name_' . app()->getLocale() . " as name");
            }])->where('category_id', $category_id)->latest()->paginate(POST_NUMBER);

            $categories = Category::select('id', 'name_' . app()->getLocale() . ' as name')->get();


            if($request->ajax()){
                return [
                    'posts' => view('post.post', compact('posts'))->render(),
                    'next_page' => $posts->nextPageUrl(),
                ];
            }

            return view('post.specific_post', compact('posts', 'categories'));
        }
    }

    public function likePost($user_id, $post_id)
    {
        $likes = new Like();

        if($user_id == Auth::user()->id){
            $likes->user_id = $user_id;
            $likes->post_id = $post_id;
            $likes->like_post = 1;
    
            $likes->save();
    
            $likes_count = Like::where('post_id' , $post_id)->count();
            return response()->json([
                'like_count' => $likes_count,
            ]);
        }else{
            return redirect()->back();
        }


    }

    public function dislikePost($user_id, $post_id)
    {

        if($user_id == Auth::user()->id){
            $likes = Like::where([
                ['user_id', $user_id],
                ['post_id', $post_id]
            ])->delete();
        }else{
            return redirect()->back();
        }

        $likes_count = Like::where('post_id' , $post_id)->count();
        return response()->json([
            'like_count' => $likes_count,
        ]);

    }
}
