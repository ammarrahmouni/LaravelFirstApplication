<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Post extends Model implements TranslatableContract
{
    use HasFactory, Translatable;

    protected $table = 'posts';
    protected $fillable = ['image', 'category_id', 'user_id', 'created_at', 'updated_at'];

    public $translatedAttributes = ['title', 'description'];

    public function users(){
        return $this->belongsTo('\App\Models\User', 'user_id', 'id');
    }

    public function categoryes(){
        return $this->belongsTo('App\Models\Category', 'category_id', 'id');
    }

    public function postTranslations(){
        return $this->hasMany(PostTranslation::class, 'post_id');
    }

    public function likes(){
        return $this->hasMany(Like::class, 'post_id');
    }
}
