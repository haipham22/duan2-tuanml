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

    protected static function boot()
    {
        parent::boot();
        static::deleting(function ($model) {
            return $model->changeCateID();
        });
    }


    private function changeCateID()
    {
        return $this->posts->each(function ($item) {
            return $item->update([
                'category_id' => 1,
            ]);
        });
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function posts()
    {
        return $this->hasMany(Post::class, 'category_id');
    }

    public function setNameAttribute($value)
    {
        return $this->attributes['name'] = empty($value) ? : ($value);
    }

    public function setCountAttribute()
    {
        return $this->attributes['count'] = !$this->posts()->count() > 0 ? $this->posts()->count() :0;
    }

}
