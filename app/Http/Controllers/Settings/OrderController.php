<?php

namespace Hardware\Http\Controllers\Settings;

use Illuminate\Http\Request;
use Hardware\Http\Controllers\Controller;
use Session;
use Hardware\Http\Models\Order;
use Hardware\Http\Requests\OrderRequest;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::latest()->get();
        return view('admin.orders.index', compact('orders'));
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
    public function show($order_no)
    {
        $order = Order::where('order_no', $order_no)->first();
        return view('admin.orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($order_no)
    {
        $order = Order::where('order_no', $order_no)->first();
        return view('admin.orders.edit', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(OrderRequest $request, $order_no)
    {
        $order = Order::where('order_no', $order_no)->first();
        $order->order_status = $request->order_status;
        $order->shipping_status = $request->shipping_status;
        $order->shipping_tracking_number = $request->shipping_tracking_number;
        $order->shipping_label_url = $request->shipping_label_url;
        $order->payment_status = $request->payment_status;
        $order->payment_reference = $request->payment_reference;
        $order->update();
        if ($order) {
            Session::flash('order_updated', 'Order Updated Successfully!');
            return redirect()->route('order.index');
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
        //
    }
}
