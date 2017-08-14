<?php

namespace App\Models;

use App\Listeners\NewUserListener;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    protected $events = [
        'created' => NewUserListener::class,
    ];

    /**
     * @return bool
     */
    public function getIsAdminAttribute()
    {
        return $this->role == 1 ? true : false;
    }



    /**
     * User đăng nhiều bài viết
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function posts()
    {
        return $this->hasMany(Post::class, 'user_id');
    }


    public function comment()
    {
        return $this->hasMany(Comment::class, 'user_id');
    }


}
