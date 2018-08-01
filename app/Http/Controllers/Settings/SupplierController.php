<?php

namespace Hardware\Http\Controllers\Settings;

use Illuminate\Http\Request;
use Hardware\Http\Controllers\Controller;
use Hardware\Http\Models\Supplier;
use Session;
use Hardware\Http\Requests\SupplierRequest;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suppliers = Supplier::latest()->get();
        return view('admin.supplier.index', compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.supplier.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SupplierRequest $request)
    {
        $supplier = new Supplier;
        $supplier->supplier_code = 'PLCH_'.md5(uniqid(rand(), true));
        $supplier->company_name = $request->company_name;
        $supplier->company_address = $request->company_address;
        $supplier->company_webpage = $request->company_webpage;
        $supplier->first_name = $request->first_name;
        $supplier->last_name = $request->last_name;
        $supplier->phone_number = $request->phone_number;
        $supplier->email = $request->email;
        $supplier->skype = $request->skype;
        $supplier->whatsapp = $request->whatsapp;
        $supplier->notes = $request->notes;
        $supplier->save();
        if ($supplier) {
            Session::flash('created', 'New Supplier Created Successfully');
            return redirect()->route('supplier.index');
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
        $supplier = Supplier::findOrFail($id);
        return view('admin.supplier.edit', compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SupplierRequest $request, $id)
    {
        $supplier = Supplier::findOrFail($id);
        $supplier->company_name = $request->company_name;
        $supplier->company_address = $request->company_address;
        $supplier->company_webpage = $request->company_webpage;
        $supplier->first_name = $request->first_name;
        $supplier->last_name = $request->last_name;
        $supplier->phone_number = $request->phone_number;
        $supplier->email = $request->email;
        $supplier->skype = $request->skype;
        $supplier->whatsapp = $request->whatsapp;
        $supplier->notes = $request->notes;
        $supplier->update();
        if ($supplier) {
            Session::flash('updated', 'Supplier Updated Successfully');
            return redirect()->route('supplier.index');
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
        $supplier = Supplier::findOrFail($id);
        $supplier->delete();
        if ($supplier) {
            Session::flash('deleted', 'Supplier Deleted Successfully');
            return redirect()->route('supplier.index');
        }
    }
}
