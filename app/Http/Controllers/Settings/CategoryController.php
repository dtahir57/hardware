<?php

namespace Hardware\Http\Controllers\Settings;

use Illuminate\Http\Request;
use Hardware\Http\Models\Category;
use Hardware\Http\Controllers\Controller;
use Hardware\Http\Requests\CategoryRequest;
use Session;
use File;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::latest()->get();
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $category = new Category;
        $category->title = $request->title;
        $category->description = $request->description;
        if ($request->hasFile('thumbnail')) {
            $category->thumbnail = $request->thumbnail->store('public/categories');
        }
        $category->slug = str_slug($request->title, '-');
        $category->save();
        if ($category) {
            Session::flash('created', 'New Category Added Successfully');
            return redirect()->route('category.index');
        }
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
        $category = Category::findOrFail($id);
        $categories = Category::all();
        return view('admin.category.edit', compact('category', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->title = $request->title;
        $category->description = $request->description;
        if ($request->hasFile('thumbnail')) {
            File::delete($category->thumbnail);
            $category->thumbnail = $request->thumbnail->store('public/categories');
        }
        $category->slug = str_slug($request->title, '-');
        if ($request->parent_category) {
            $category->is_parent = 1;
            $category->parent_category = $request->parent_category;
        }
        if ($request->is_active) {
            $category->is_active = 1;
        } else {
            $category->is_active = 0;
        }
        $category->update();
        if ($category) {
            Session::flash('updated', 'Category Updated Successfully');
            return redirect()->route('category.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        if ($category) {
            Session::flash('deleted', 'Category Deleted Successfully');
            return redirect()->route('category.index');
        }
    }

    public function feature(Request $request) {
        $category = Category::findOrFail($request->category_id);
        if ($category->is_featured) {
            $category->is_featured = 0;
            $category->update();
            if ($category) {
                Session::flash('feature', 'Category Removed from Feature!');
                return redirect()->route('category.index');
            }
        } else {
            $category->is_featured = 1;
            $category->update();
            if ($category) {
                Session::flash('feature', 'Category Featured!');
                return redirect()->route('category.index');
            }
        }
    }
}
