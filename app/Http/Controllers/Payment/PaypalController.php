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
use Hardware\Http\Models\Order;
use Hardware\Http\Models\Cart as BaseCart;
use Auth;

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

        $float = Cart::subtotal();

        $cart_subtotal = (float)$float;

        $amount = new Amount;
        $amount->setCurrency('USD')
               ->setTotal($cart_subtotal);

        $transaction = new Transaction;
        $transaction->setAmount($amount)
            ->setDescription('Transaction Has Been Made');

        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(URL::to('status')) /** Specify return URL **/
            ->setCancelUrl(URL::to('status'));

        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));

        try {
            $payment->create($this->api_context);
            if ($payment->create($this->api_context)) {
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
            }
        } catch (\PayPal\Exception\PPConnectionException $ex) {
            if (\Config::get('app.debug')) {
                \Session::put('error', 'Connection timeout');
                return Redirect::to('/');
            } else {
                \Session::put('error', 'Some error occur, sorry for inconvenient');
                return Redirect::to('/');
            }
        }
        foreach ($payment->getLinks() as $link) {
            if ($link->getRel() == 'approval_url') {
                $redirect_url = $link->getHref();
                break;
            }
        }
        /** add payment ID to session **/
        Session::put('paypal_payment_id', $payment->getId());
        if (isset($redirect_url)) {
            /** redirect to paypal **/
            return Redirect::away($redirect_url);
        }
        \Session::put('error', 'Unknown error occurred');
        return Redirect::to('/');
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

    public function getPaymentStatus()
    {
        /** Get the payment ID before session clear **/
        $payment_id = Session::get('paypal_payment_id');
        /** clear the session payment ID **/
        Session::forget('paypal_payment_id');
        if (empty(Input::get('PayerID')) || empty(Input::get('token'))) {
            \Session::flash('error', 'Payment failed');
            return Redirect::to('/status');
        }
        $payment = Payment::get($payment_id, $this->api_context);
        $execution = new PaymentExecution();
        $execution->setPayerId(Input::get('PayerID'));
        /**Execute the payment **/
        $result = $payment->execute($execution, $this->api_context);
        if ($result->getState() == 'approved') {
            \Session::flash('success', 'Payment success');
            return Redirect::to('/status');
        }
        \Session::flash('error', 'Payment failed');
        return Redirect::to('/status');
    }
}
