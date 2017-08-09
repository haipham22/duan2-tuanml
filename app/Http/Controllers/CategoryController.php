<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->action) {
            $this->action($request, Category::class);
        }
        $categories = Category::orderBy($request->sortBy  ? $request->sortBy : 'id', $request->sort ? $request->sort : 'asc')
            ->paginate(\Setting::get('paginate'));

        return view('admin.posts.categories.index', compact('categories'));
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
     * @param  \Illuminate\Http\Request|CategoryRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        if (Category::create($request->all())) {
            flash(trans('lang.categories.created'))->success();
        }
        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.posts.categories.create', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CategoryRequest|Request $request
     * @param  \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $category->update($request->all());

        flash(trans('lang.categories.updated'));

        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if ($category->id == 1) {
            flash(trans('lang.categories.errors.delete'))->error();

            return redirect()->back();
        }
        if ($category->delete()) {
            flash(trans('lang.categories.deleted'));
        }

        return redirect()->back();
    }
}
