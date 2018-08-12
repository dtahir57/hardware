<?php

namespace Hardware\Http\Controllers\Payment;

use Illuminate\Http\Request;
use Hardware\Http\Controllers\Controller;
use Hardware\Http\Requests\StripeRequest;
use Stripe\Stripe;
use Stripe\Charge;
use Stripe\Token;
use Cart;
use Session;
use Auth;
use Hardware\Http\Models\Cart as BaseCart;
use Hardware\Http\Models\Order;
use Spatie\Permission\Models\Role;

class StripeController extends Controller
{
    // private $api_key;
    public function __construct()
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));
    }
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
    public function store(StripeRequest $request)
    {
        $sub_total = Cart::subtotal();
        $total = (int)$sub_total;
        try {
            $result = Token::create(
                array(
                    "card" => array(
                        "name" => $request->name,
                        "number" => $request->number,
                        "exp_month" => $request->exp_month,
                        "exp_year" => $request->exp_year,
                        "cvc" => $request->cvc
                    )
                )
            );   
            $token = $result['id'];
            $charge = Charge::create(array(
              "amount" => $total * 100,
              "currency" => "usd",
              "source" => $token, // obtained with Stripe.js
              "description" => "The Transaction has Been Made"
            ));
            $order = new Order;
            $order->fname = $request->fname;
            $order->user_id = Auth::user()->id;
            $order->lname = $request->lname;
            $order->email = $request->email;
            $order->phone_number = $request->phone_number;
            $order->company = $request->company;
            $order->country = $request->country;
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
        } catch (Exception $e) {
            Session::flash('error', 'Card Details may be wrong');
            return redirect()->back();
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
