<?php

namespace Hardware\Http\Controllers;

use Illuminate\Http\Request;
use Hardware\Http\Models\Category;
use Hardware\Http\Models\Order;
use Cart;
use Auth;

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
        return view('home', compact('categories', 'cartItems', 'orders'));
    }
}
