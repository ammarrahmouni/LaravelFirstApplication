<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Login Operations
Auth::routes(['verify' => true]);

Route::get('home', [HomeController::class, 'index'])->name('home');


Route::get('/', [PostController::class, 'gusetUser'])->name('guset.user');

// Post Operations

Route::prefix('home')->middleware(["auth", "verified"])->group(function () {

    Route::post('/save-post/{user_id}', [PostController::class, 'savePost'])->name('save.post');

    Route::get('/show-post/{user_id}', [PostController::class, 'showPost'])->name('show.post');

    Route::post('/update-post/{post_id}/{user_id}', [PostController::class, 'updatePost'])->name('update.post');

    Route::post('/delete-post/{post_id}', [PostController::class, 'deletePost'])->name('delete.post');
});

Route::get('category/{category_id}', [PostController::class, 'specificCategory'])->name('category.post');

Route::get('search', [PostController::class, 'searchPost'])->name('search.post');

Route::get('user-profile/{user_id}', [UserController::class, 'visitUserProfile'])->name('visit.user.profile');

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('like-post/{user_id}/{post_id}', [PostController::class, 'likePost'])->name('like.post');

    Route::get('dislike-post/{user_id}/{post_id}', [PostController::class, 'dislikePost'])->name('dislike.post');

});

Route::get('profile/{user_id}', [UserController::class, 'myProfile'])->name('profile');

Route::prefix('profile')->group(function () {
    Route::post('/update-info/{user_id}', [UserController::class, 'editUserInfo'])->name('edit.user.info');
    Route::post('/update-img/{user_id}', [UserController::class, 'editUserImage'])->name('edit.user.image');
});
