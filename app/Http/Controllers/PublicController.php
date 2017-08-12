<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use View;

class PublicController extends Controller
{

    public function __construct()
    {
        view()->composer('layouts.menu', function ($view) {
            return $view->with([
                'menu'  => Category::orderByDesc('id')->get()
            ]);
        });
    }

    public function index()
    {
        $posts = Post::orderByDesc('created_at')->get();

        return view('frontend.index', compact('posts'));
    }

    public function post($slug)
    {
        $post = Post::whereSlug($slug)->firstOrFail();

        return view('frontend.post', compact('post'));
    }

    public function category($slug)
    {
        $items = Category::whereSlug($slug)->firstOrFail();
        return view('frontend.category', compact('items'));
    }

    public function video()
    {

    }

    public function album()
    {
        $items = Category::where('name', 'Hình ảnh')->firstOrFail();
        return view('frontend.hinhanh', compact('items'));
    }
}

