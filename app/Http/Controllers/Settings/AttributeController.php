<?php

namespace Hardware\Http\Controllers\Settings;

use Illuminate\Http\Request;
use Hardware\Http\Controllers\Controller;
use Hardware\Http\Models\Attribute;
use Hardware\Http\Requests\AttributeRequest;
use Session;

class AttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attributes = Attribute::latest()->get();
        return view('admin.attribute.index', compact('attributes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.attribute.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AttributeRequest $request)
    {
        $attribute = new Attribute;
        $attribute->type = $request->type;
        $attribute->label = $request->label;
        $attribute->order = $request->order;
        if ($request->use_as_filter) {
            $attribute->use_as_filter = 1;
        } else {
            $attribute->use_as_filter = 0;
        }
        if ($request->is_required) {
            $attribute->is_required = 1;
        } else {
            $attribute->is_required = 0;
        }
        $attribute->save();
        if ($attribute) {
            Session::flash('created', 'New Attribute Created Successfully!');
            return redirect()->route('attribute.index');
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
        $attribute = Attribute::findOrFail($id);
        return view('admin.attribute.edit', compact('attribute'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AttributeRequest $request, $id)
    {
        $attribute = Attribute::findOrFail($id);
        $attribute->type = $request->type;
        $attribute->label = $request->label;
        $attribute->order = $request->order;
        if ($request->use_as_filter) {
            $attribute->use_as_filter = 1;
        } else {
            $attribute->use_as_filter = 0;
        }
        if ($request->is_required) {
            $attribute->is_required = 1;
        } else {
            $attribute->is_required = 0;
        }
        $attribute->update();
        if ($attribute) {
            Session::flash('updated', 'Attribute Updated Successfully');
            return redirect()->route('attribute.index');
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
        $attribute = Attribute::findOrFail($id);
        $attribute->delete();
        if ($attribute) {
            Session::flash('deleted', 'Attribute Deleted Successfully');
            return redirect()->route('attribute.index');
        }
    }
}
