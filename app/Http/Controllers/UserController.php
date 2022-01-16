<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserUpdateRequest;
use App\Models\Like;
use App\Models\Post;
use Illuminate\Support\Facades\Validator;

class UserController extends MainController
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified'])->except('visitUserProfile');
        $categories = Category::select('id', 'name_' . app()->getLocale() . ' as name')->get();
        $this->data_category['categories'] = $categories;
    }

    public function myProfile($user_id)
    {
        if ($user_id == Auth::user()->id) {
            $posts = Post::where('user_id', $user_id)->paginate(POST_NUMBER);
            return view('user.user_profile', compact('posts'), $this->data_category);
        } else {
            return redirect()->back()->with('dont_have_premission', __('home.dont_have_premission'));
        }
    }

    public function editUserInfo(UserUpdateRequest $request)
    {
        $user = User::findOrFail($request->user_id);

        if (!$user) {
            return response()->json([
                'status' => false,
                'msg'    => __('login.update_not_done')
            ]);
        } else {
            $user_name = filter_var($request->name, FILTER_SANITIZE_STRING);
            $user_phone = filter_var($request->phone, FILTER_SANITIZE_STRING);
            $user_address = filter_var($request->address, FILTER_SANITIZE_STRING);
            $user->update([
                'name'  => $user_name,
                'phone' => $user_phone,
                'address' => $user_address
            ]);
            return response()->json([
                'status' => true,
                'msg'    => __('login.update_done'),
                'done'   => __('home.done'),
                'info'   => [$user_name, $user_phone, $user_address]
            ]);
        }
    }

    public function editUserImage(Request $request, $user_id)
    {
        $validate = Validator::make($request->all(), [
            'image' => 'required|mimes:jpeg,jpg,png|max:2048'
        ], [
            'image.required' => __('home.image_rqd'),
            'image.mimes'    => __('home.image_type'),
            'image.max'      => __('home.image_max'),
        ]);

        if (!($validate->fails())) {

            $user = User::findOrFail($user_id);


            $path = '';
            if ($request->hasFile('image')) {
                $path = $request->file('image')->store('');
                $request->file('image')->move('uploads/images', $path);
            }

            $user->update([
                'image' => $path,
            ]);


            return response()->json([
                'status' => true,
                'done'   => __('home.done'),
                'msg'    => __('login.img_updated'),
                'image'  =>  $path,
            ]);
        } else {
            return response()->json([
                'status' => false,
                'msg' => $validate->errors()->all(),
            ]);
        }
    }

    public function visitUserProfile($user_id)
    {

        $user = User::select('id', 'name', 'email', 'phone', 'address', 'image')->findOrFail($user_id);
        $posts = Post::where('user_id', $user_id)->paginate(POST_NUMBER);
        $categories = Category::select('id', 'name_' . app()->getLocale() . ' as name')->get();


        if (!Auth::check()) {
            return view('user.visit_user_profile', compact('user', 'posts'), $this->data_category);
        } else {
            if ($user_id == Auth::user()->id) {
                return view('user.user_profile', compact('posts'), $this->data_category);
            } else {
                return view('user.visit_user_profile', compact('user', 'posts'), $this->data_category);
            }
        }
    }
}
