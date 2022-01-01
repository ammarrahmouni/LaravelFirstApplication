<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostTranslation extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['locale', 'title', 'description'];

    public function posts(){
        return $this->belongsTo(Post::class, 'post_id');
    }
}
