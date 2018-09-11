<?php

namespace Hardware\Http\Controllers\Payment;

use Illuminate\Http\Request;
use Hardware\Http\Controllers\Controller;
use Hardware\Http\Requests\PaymentRequest;
use Hardware\Http\Models\Order;
use Hardware\Http\Models\Cart as BaseCart;
use Cart;
use Session;
use Auth;
use Spatie\Permission\Models\Role;

class CashOnDeliveryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(PaymentRequest $request)
    {
        $order = new Order;
        $order->fname = $request->fname;
        $order->user_id = Auth::user()->id;
        $order->lname = $request->lname;
        $order->email = $request->email;
        $order->phone_number = $request->phone_number;
        $order->company = $request->company;
        $order->country = $request->country;
        $order->payment_status = 'pending';
        $order->city = $request->city;
        $order->zip = $request->zip;
        $order->address1 = $request->address1;
        $order->address2 = $request->address2;
        $order->payment_method = $request->payment_method;
        $order->order_no = 'PLCH_W_'.str_random(8);
        $order->amount = Cart::subtotal();
        $order->save();
        $cartItems = Cart::content();
        foreach($cartItems as $cartItem) {
            $cart = new BaseCart;
            $cart->order_id = $order->id;
            $cart->product_name = $cartItem->name;
            $cart->qty = $cartItem->qty;
            $cart->price = $cartItem->price;
            $cart->save();
        }

        Cart::destroy();
        Session::flash('success', 'The Transaction has Been Made');
        if (Auth::user()->hasAnyRole(Role::all())) {
            return redirect()->route('order.index');
        } else {
            $categories = Category::latest()->get();
            $cartItems = Cart::content();
            $orders = Order::where('user_id', Auth::user()->id)->get();
            return redirect()->route('order.index', compact('categories', 'cartItems', 'orders'));
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
}
