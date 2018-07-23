<?php

namespace Hardware\Http\Controllers\Settings;

use Illuminate\Http\Request;
use Hardware\Http\Controllers\Controller;
use Hardware\Http\Models\Tag;
use Hardware\Http\Requests\TagRequest;
use Session;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::latest()->get();
        return view('admin.tag.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tag.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TagRequest $request)
    {
        $tag = new Tag;
        $tag->name = $request->name;
        $tag->slug = str_slug($request->name, '-');
        if ($request->is_active) {
            $tag->is_active = 1;
        } else {
            $tag->is_active = 0;
        }
        $tag->save();
        if ($tag) {
            Session::flash('created', 'Tag Created Successfully!');
            return redirect()->route('tag.index');
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
        $tag = Tag::find($id);
        return view('admin.tag.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TagRequest $request, $id)
    {
        $tag = Tag::findOrFail($id);
        $tag->name = $request->name;
        $tag->slug = str_slug($request->name, '-');
        if ($request->is_active) {
            $tag->is_active = 1;
        } else {
            $tag->is_active = 0;
        }
        $tag->update();
        if ($tag) {
            Session::flash('updated', 'Tag Updated Successfully!');
            return redirect()->route('tag.index');
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
        $tag = Tag::find($id);
        $tag->delete();
        if ($tag) {
            Session::flash('updated', 'Tag Deleted Successfully');
            return redirect()->route('tag.index');
        }
    }
}
