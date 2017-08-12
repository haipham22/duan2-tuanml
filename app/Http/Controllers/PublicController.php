<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
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

        $games = Category::whereName('Tin Game')->first();

        $esport = Category::whereName('Tin Esport')->first();

        $cosplays = Category::whereName('Hình Ảnh')->first();

        $hot_news = Post::orderByDesc('view')->limit(5)->get();

        return view('frontend.index', compact(
            'posts', 'games', 'esport', 'cosplays', 'hot_news'
        ));
    }

    public function post($slug)
    {
        $post = Post::whereSlug($slug)->firstOrFail();

        \Event::fire('post.view', $post);

        return view('frontend.post', compact('post'));
    }

    public function category($slug)
    {
        $items = Category::whereSlug($slug)->firstOrFail();
        return view('frontend.category', compact('items'));
    }

    public function search(Request $request)
    {
        $items = Post::where('name', 'like', "%$request->s%")->orderByDesc('created_at')->get();

        return view('frontend.search', compact('items'));
    }
/*
    public function video()
    {

    }

    public function album()
    {
        $items = Category::where('name', 'Hình ảnh')->firstOrFail();
        return view('frontend.hinhanh', compact('items'));
    }*/

    public function addComment(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'content'   => 'required|min:10|max:100'
        ]);
        $input = $request->all();

        if (\Auth::check()) {
            $input['public'] = 1;
        }
        Comment::create($input);

        return redirect()->back();
    }
}

