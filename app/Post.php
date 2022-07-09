<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    public function category() {
        return $this->belongsTo('App\Category');
    }

    protected $fillable = [
        'title',
        'slug',
        'content',
        'category_id'
    ];

    public static function generate_slug($title) {
        $slug = Str::slug($title, '-');
        $base_slug = $slug;
        $post_presente = Post::where('slug', $slug)->first();
        $id = 2;
        while ($post_presente) {
            $slug = $base_slug . '-' . $id;
            $id++;
            $post_presente = Post::where('slug', $slug)->first();
        }

        return $slug;
    }
}
