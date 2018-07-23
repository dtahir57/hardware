<?php

namespace Hardware\Http\Controllers\Settings;

use Illuminate\Http\Request;
use Hardware\Http\Controllers\Controller;
use Hardware\Http\Models\Manufacturer;
use Hardware\Http\Requests\ManufacturerRequest;
use Session;
use File;

class ManufacturerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $manufacturers = Manufacturer::latest()->get();
        return view('admin.manufacturer.index', compact('manufacturers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.manufacturer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ManufacturerRequest $request)
    {
        $manufacturer = new Manufacturer;
        $manufacturer->name = $request->name;
        $manufacturer->slug = str_slug($request->name, '_');
        if ($request->hasFile('image')) {
            $manufacturer->image = $request->image->store('public/manufacturer');
        }
        if ($request->is_active) {
            $manufacturer->is_active = 1;
        } else {
            $manufacturer->is_active = 0;
        }
        $manufacturer->save();
        if ($manufacturer) {
            Session::flash('created', 'New Manufacturer Added Successfully');
            return redirect()->route('manufacturer.index');
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
        $manufacturer = Manufacturer::findOrFail($id);
        return view('admin.manufacturer.edit', compact('manufacturer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $manufacturer = Manufacturer::findOrFail($id);
        $manufacturer->name = $request->name;
        $manufacturer->slug = str_slug($request->name, '_');
        if ($request->hasFile('image')) {
            File::delete($manufacturer->image);
            $manufacturer->image = $request->image->store('public/manufacturer');
        }
        if ($request->is_active) {
            $manufacturer->is_active = 1;
        } else {
            $manufacturer->is_active = 0;
        }
        $manufacturer->save();
        if ($manufacturer) {
            Session::flash('updated', 'Manufacturer Updated Successfully');
            return redirect()->route('manufacturer.index');
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
        $manufacturer = Manufacturer::findOrFail($id);
        File::delete($manufacturer->image);
        $manufacturer->delete();
        if ($manufacturer) {
            Session::flash('deleted', 'Manufacturer Deleted Successfully');
            return redirect()->route('manufacturer.index');
        }
    }
}
