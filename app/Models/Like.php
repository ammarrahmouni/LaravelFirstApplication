<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    protected $table = 'likes';
    protected $fillable = ['post_id', 'user_id', 'like_post'];
    public $timestamps = false;

    public function post(){
        return $this->belongsTo(Post::class, 'post_id');
    }

}
