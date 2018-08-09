<?php

namespace Hardware\Http\Controllers;

use Illuminate\Http\Request;
use Hardware\Http\Models\Category;
use Hardware\Http\Models\Product;
use Hardware\Http\Models\Manufacturer;
use Cart;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $manufacturers = Manufacturer::where('is_active', 1)->get();
        $categories = Category::with('childs')->get();
        $products = Product::latest()->get();
        $cartItems = Cart::content();
        return view('shop.index', compact('categories', 'products', 'manufacturers', 'cartItems'));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $manufacturers = Manufacturer::where('is_active', 1)->get();
        $categories = Category::with('childs')->get();
        $category = Category::with('products')->where('slug',$slug)->get();
        $cartItems = Cart::content();
        // dd($category{0}->products);
        return view('category.index', compact('category', 'manufacturers', 'categories', 'cartItems'));
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

    public function getSingleProduct($category, $product)
    {
        $categories = Category::with('childs')->get();
        $product = Product::where('slug', $product)->first();
        $cartItems = Cart::content();
        return view('shop.single_product', compact('product', 'cartItems', 'categories'));
    }
}
