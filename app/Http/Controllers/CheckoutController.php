<?php

namespace Hardware\Http\Controllers;

use Illuminate\Http\Request;
use Hardware\Http\Models\Category;
use Cart;

class CheckoutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->payment_method == 'paypal') {
            $cartItems = Cart::content();
            $categories = Category::with('childs')->get();
            $payment_method = $request->payment_method;
            return view('paypal.index', compact('categories', 'cartItems', 'payment_method'));
        } elseif ($request->payment_method == 'stripe') {
            $cartItems = Cart::content();
            $categories = Category::with('childs')->get();
            $payment_method = $request->payment_method;
            return view('stripe.index', compact('categories', 'cartItems', 'payment_method'));
        } elseif ($request->payment_method == 'cod') {
            $cartItems = Cart::content();
            $categories = Category::with('childs')->get();
            $payment_method = $request->payment_method;
            return view('cod.index', compact('categories', 'cartItems', 'payment_method'));
        } else {
            return redirect()->back();
        }
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
}
