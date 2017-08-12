<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return Datatables::of(Comment::orderBy('created_at', 'desc')->get())
                ->addColumn('id', function ($item) {
                    return '<input type="checkbox" name="ids[]" value="' . $item->id .'">';
                })->addColumn('post', function ($item) {
                    return link_to_route('post', $item->post->name, $item->post->slug);
                })->addColumn('tool', function ($item) {
                    return view('admin.comment.tool', compact('item'))->render();
                })->addColumn('created_at', function ($item) {
                    return $item->created_at->toFormattedDateString();
                })->rawColumns(['id', 'tool'])->make(true);
        }
        return view('admin.comment.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        $comment->update($request->all());

        flash(trans('lang.comments.updated'))->success();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = Comment::find($id);

        $comment->delete();

        flash(trans('lang.comments.deleted'))->success();

        return redirect()->back();
    }
}
