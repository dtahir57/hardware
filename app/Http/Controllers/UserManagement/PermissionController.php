<?php

namespace Hardware\Http\Controllers\UserManagement;

use Illuminate\Http\Request;
use Hardware\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;
use Hardware\Http\Requests\PermissionRequest;
use Session;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = Permission::latest()->get();
        return view('admin.UserManagement.permission.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.UserManagement.permission.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PermissionRequest $request)
    {
        $permission = new Permission;
        $permission->module = $request->module;
        $permission->name = $request->name;
        $permission->save();
        if ($permission) {
            Session::flash('created', 'New Permission Created Successfully');
            return redirect()->route('permission.index');
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
        $permission = Permission::findOrFail($id);
        return view('admin.UserManagement.permission.edit', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PermissionRequest $request, $id)
    {
        $permission = Permission::findOrFail($id);
        $permission->module = $request->module;
        $permission->name = $request->name;
        $permission->update();
        if ($permission) {
            Session::flash('updated', 'Permission Updated Successfully!');
            return redirect()->route('permission.index');
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
        $permission = Permission::findOrFail($id);
        $permission->delete();
        if ($permission) {
            Session::flash('deleted', 'Permission Deleted Successfully!');
            return redirect()->route('permission.index');
        }
    }
}
