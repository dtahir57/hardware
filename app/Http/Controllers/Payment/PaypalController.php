<?php

namespace Hardware\Http\Controllers\Payment;

use Illuminate\Http\Request;
use Hardware\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
/** All Paypal Details class **/
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;
use Redirect;
use Session;
use URL;
use Hardware\Http\Requests\PaymentRequest;
use Cart;

class PaypalController extends Controller
{
    private $api_context;

    public function __construct()
    {
        $paypal_config = \Config::get('paypal');
        $this->api_context = new ApiContext(new OAuthTokenCredential(
            $paypal_config['client_id'],
            $paypal_config['client_secret']
        ));
        $this->api_context->setConfig($paypal_config['settings']);
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
    public function store(PaymentRequest $request)
    {
        $payer = new Payer;
        $payer->setPaymentMethod('paypal');

        $cartItems = Cart::content();
        foreach($cartItems as $cartItem) {
            $item = new Item;
            $item->setName($cartItem->name)
                 ->setCurrency('USD')
                 ->setQuantity($cartItem->qty)
                 ->setPrice($cartItem->price);
        }
        $item_list = new ItemList;
        $item_list = setItems(array($item));

        $float = Cart::subtotal();

        $cart_subtotal = (float)$float;

        $amount = new Amount;
        $amount->setCurrency('USD')
               ->setTotal($cart_subtotal);

        $transaction = new Transaction;
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
