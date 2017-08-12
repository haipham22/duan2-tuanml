<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'name', 'slug', 'category_id', 'user_id', 'content', 'thumbnail'
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'post_id');
    }

    public function categories()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
