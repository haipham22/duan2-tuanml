<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $page = Post::orderByDesc('created_at')->get();;
            return Datatables::of($page)->addColumn('tool', function ($item) {
                return view('admin.posts.posts.tool', compact('item'))->render();
            })->addColumn('id', function ($item) {
                return '<input type="checkbox" name="ids[]" value="' . $item->id .'">';
            })->addColumn('name', function ($item) {
                return link_to_route('posts.edit', $item->name, $item->id);
            })->addColumn('categories', function ($item) {
                return link_to_route('categories.edit', $item->categories->name,  $item->categories->id);
            })->rawColumns(['tool', 'id', 'categories'])->make(true);
        }
        return view('admin.posts.posts.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $post = [];
        $categories = Category::get()->pluck('name', 'id');
        return view('admin.posts.posts.create', compact('post', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        \Auth::user()->posts()->create($request->all());

        flash(trans('lang.posts.created'))->success();

        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     * @internal param \App\Models\Post $post
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     * @internal param \App\Models\Post $post
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::get()->pluck('name', 'id');
        return view('admin.posts.posts.create', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\PostRequest|\Illuminate\Http\Request $request
     * @param  \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post $post)
    {
        $post->update($request->all());

        flash(trans('lang.posts.updated'))->success();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        try {
            $post->delete();
            flash(trans('lang.posts.deleted'));
            return redirect()->back();
        } catch (\ErrorException $exception) {
            \Log::error($exception->getMessage());
        }
    }
}
