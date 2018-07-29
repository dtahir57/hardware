<?php

namespace Hardware\Http\Controllers\Settings;

use Illuminate\Http\Request;
use Hardware\Http\Controllers\Controller;
use Hardware\Http\Models\ProductCondition;
use Hardware\Http\Requests\ProductConditionRequest;
use Session;

class ProductConditionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product_conditions = ProductCondition::latest()->get();
        return view('admin.ProductCondition.index', compact('product_conditions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.ProductCondition.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductConditionRequest $request)
    {
        $product_condition = new ProductCondition;
        $product_condition->initials = $request->initials;
        $product_condition->short_description = $request->short_description;
        $product_condition->long_description = $request->long_description;
        $product_condition->warranty = $request->warranty;
        $product_condition->warranty_description = $request->warranty_description;
        $product_condition->slug = str_slug($request->short_description);
        $product_condition->save();
        if ($product_condition) {
            Session::flash('created', 'New Product Condition created Successfully');
            return redirect()->route('product_condition.index');
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
        $product_condition = ProductCondition::findOrFail($id);
        return view('admin.ProductCondition.edit', compact('product_condition'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductConditionRequest $request, $id)
    {
        $product_condition = ProductCondition::findOrFail($id);
        $product_condition->initials = $request->initials;
        $product_condition->short_description = $request->short_description;
        $product_condition->long_description = $request->long_description;
        $product_condition->warranty = $request->warranty;
        $product_condition->warranty_description = $request->warranty_description;
        $product_condition->slug = str_slug($request->short_description);
        if ($request->product_condition) {
            $product_condition->is_active = 1;
        } else {
            $product_condition->is_active = 0;
        }
        $product_condition->update();
        if ($product_condition) {
            Session::flash('updated', 'Product Condition Updated Successfully');
            return redirect()->route('product_condition.index');
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
        $product_condition = ProductCondition::findOrFail($id);
        $product_condition->delete();
        if ($product_condition) {
            Session::flash('deleted', 'Product Condition Deleted Successfully');
            return redirect()->route('product_condition.index');
        }
    }
}
