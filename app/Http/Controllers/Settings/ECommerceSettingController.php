<?php

namespace Hardware\Http\Controllers\Settings;

use Illuminate\Http\Request;
use Hardware\Http\Controllers\Controller;
use Hardware\Http\Models\EcommerceShipping;
use Hardware\Http\Models\EcommerceSearch;
use Hardware\Http\Requests\EShippingSettingRequest;
use Hardware\Http\Requests\ESearchSettingRequest;
use Session;

class ECommerceSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shipping = EcommerceShipping::first();
        $search = EcommerceSearch::first();
        return view('admin.settings.index', compact('shipping', 'search'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EShippingSettingRequest $request)
    {
        $eShipping = EcommerceShipping::first();
        if ($eShipping) {
            $eShipping->weight = $request->weight;
            $eShipping->dimensions = $request->dimensions;
            if ($request->tax) {
                $eShipping->tax = 1;
            } else {
                $eShipping->tax = 0;
            }
            if ($request->wishlist) {
                $eShipping->wishlist = 1;
            } else {
                $eShipping->wishlist = 0;
            }
            $eShipping->save();
            if ($eShipping) {
                Session::flash('updated', 'Shipping Settings updated');
                return redirect()->route('setting.index');
            }
        } else {
            $shipping = new EcommerceShipping;
            $shipping->weight = $request->weight;
            $shipping->dimensions = $request->dimensions;
            if ($request->tax) {
                $shipping->tax = 1;
            } else {
                $shipping->tax = 0;
            }
            if ($request->wishlist) {
                $shipping->wishlist = 1;
            } else {
                $shipping->wishlist = 0;
            }
            $shipping->save();
            if ($shipping) {
                Session::flash('created', 'Shipping Settings created');
                return redirect()->route('setting.index');
            }   
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function storeSearch(ESearchSettingRequest $request)
    {
        $eSearch = EcommerceSearch::first();
        if ($eSearch) {
            $eSearch->title_weight = $request->title_weight;
            $eSearch->content_weight = $request->content_weight;
            if ($request->is_wildcard_search) {
                $eSearch->is_wildcard_search = 1;
            } else {
                $eSearch->is_wildcard_search = 0;
            }
            $eSearch->update();
            if ($eSearch) {
                Session::flash('search_updated', 'Ecommerce Settings Updated');
                return redirect()->route('setting.index');
            }
        } else {
            $search = new EcommerceSearch;
            $search->title_weight = $request->title_weight;
            $search->content_weight = $request->content_weight;
            if ($request->is_wildcard_search) {
                $search->is_wildcard_search = 1;
            } else {
                $search->is_wildcard_search = 0;
            }
            $search->save();
            if ($search) {
                Session::flash('search_created', 'Ecommerce Settings Created');
                return redirect()->route('setting.index');
            }
        }
    }
}
