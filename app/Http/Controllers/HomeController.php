<?php

namespace Hardware\Http\Controllers;

use Illuminate\Http\Request;
use Hardware\Http\Models\Category;
use Hardware\Http\Models\Order;
use Cart;
use Auth;
use Hardware\Http\Models\Manufacturer;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cartItems = Cart::content();
        $categories = Category::where('is_active', 1)->get();
        $orders = Order::where('user_id', Auth::user()->id)->get();
        $top_categories = Category::orderBy('id', 'desc')->take(5)->get();
        $brands = Manufacturer::orderBy('id', 'desc')->take(5)->get();
        return view('home', compact('categories', 'cartItems', 'orders', 'top_categories', 'brands'));
    }
}
