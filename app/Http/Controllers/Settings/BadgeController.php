<?php

namespace Hardware\Http\Controllers\Settings;

use Illuminate\Http\Request;
use Hardware\Http\Controllers\Controller;
use Hardware\Http\Models\Badge;
use Hardware\Http\Requests\BadgeRequest;
use Session;

class BadgeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $badges = Badge::latest()->get();
        return view('admin.badge.index', compact('badges'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.badge.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BadgeRequest $request)
    {
        $badge = new Badge;
        $badge->name = $request->name;
        $badge->save();
        if ($badge) {
            Session::flash('created', 'New Badge Created Successfully');
            return redirect()->route('badge.index');
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
        $badge = Badge::findOrFail($id);
        return view('admin.badge.edit', compact('badge'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BadgeRequest $request, $id)
    {
        $badge = Badge::findOrFail($id);
        $badge->name = $request->name;
        $badge->update();
        if ($badge) {
            Session::flash('updated', 'Badge Updated Successfully');
            return redirect()->route('badge.index');
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
        $badge = Badge::findOrFail($id);
        $badge->delete();
        if ($badge) {
            Session::flash('deleted', 'Badge Deleted Successfully');
            return redirect()->route('badge.index');
        }
    }
}
