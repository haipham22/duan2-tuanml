<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'name', 'slug', 'content', 'status', 'orders', 'count'
    ];

    /**
     * @var bool
     */
    public $timestamps = false;



    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function posts()
    {
        return $this->hasMany(Post::class, 'category_id');
    }

    /**
     * @param $value
     * @return mixed
     */
    public function setNameAttribute($value)
    {
        return $this->attributes['name'] = empty($value) ? : ($value);
    }


}
