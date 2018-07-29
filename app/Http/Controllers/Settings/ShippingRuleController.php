<?php

namespace Hardware\Http\Controllers\Settings;

use Illuminate\Http\Request;
use Hardware\Http\Controllers\Controller;
use Hardware\Http\Models\ShippingRule;
use Session;
use Hardware\Http\Requests\ShippingRuleRequest;
use File;

class ShippingRuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shipping_rules = ShippingRule::latest()->get();
        return view('admin.ShippingRule.index', compact('shipping_rules'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.ShippingRule.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ShippingRuleRequest $request)
    {
        $shipping_rule = new ShippingRule;
        $shipping_rule->name = $request->name;
        $shipping_rule->priority = $request->priority;
        $shipping_rule->country = $request->country;
        $shipping_rule->shipping_provider = $request->shipping_provider;
        $shipping_rule->shipping_features = $request->shipping_features;
        $shipping_rule->minimum_order_total = $request->minimum_order_total;
        $shipping_rule->description = $request->description;
        if ($request->is_exclusive) {
            $shipping_rule->is_exclusive = 1;
        } else {
            $shipping_rule->is_exclusive = 0;
        }
        if ($request->hasFile('thumbnail')) {
            $shipping_rule->thumbnail = $request->thumbnail->store('public/shipping_rules');
        }
        $shipping_rule->save();
        if ($shipping_rule) {
            Session::flash('created', 'New Shipping Rule Created Successfully');
            return redirect()->route('shipping_rule.index');
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
        $shipping_rule = ShippingRule::findOrFail($id);
        return view('admin.ShippingRule.edit', compact('shipping_rule'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ShippingRuleRequest $request, $id)
    {
        $shipping_rule = ShippingRule::findOrFail($id);
        $shipping_rule->name = $request->name;
        $shipping_rule->priority = $request->priority;
        $shipping_rule->country = $request->country;
        $shipping_rule->shipping_provider = $request->shipping_provider;
        $shipping_rule->shipping_features = $request->shipping_features;
        $shipping_rule->minimum_order_total = $request->minimum_order_total;
        $shipping_rule->description = $request->description;
        if ($request->is_exclusive) {
            $shipping_rule->is_exclusive = 1;
        } else {
            $shipping_rule->is_exclusive = 0;
        }
        if ($request->hasFile('thumbnail')) {
            File::delete($shipping_rule->thumbnail);
            $shipping_rule->thumbnail = $request->thumbnail->store('public/shipping_rules');
        }
        $shipping_rule->update();
        if ($shipping_rule) {
            Session::flash('created', 'New Shipping Rule Created Successfully');
            return redirect()->route('shipping_rule.index');
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
        $shipping_rule = ShippingRule::findOrFail($id);
        File::delete($shipping_rule->thumbnail);
        $shipping_rule->delete();
        if ($shipping_rule) {
            Session::flash('deleted', 'Shipping Rule Deleted Successfully');
            return redirect()->route('shipping_rule.index');
        }
    }
}
