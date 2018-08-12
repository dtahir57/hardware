@extends('layouts.app')

@section('title', 'Orders')

@section('content')
<div class="page-title">
  <div class="container">
    <div class="column">
      <h1>My Orders</h1>
    </div>
    <div class="column">
      <ul class="breadcrumbs">
        <li><a href="{{ url('/') }}">Home</a>
        </li>
        <li class="separator">&nbsp;</li>
        <li>My Orders</li>
      </ul>
    </div>
  </div>
</div>
<div class="container padding-bottom-3x mb-2">
  <div class="row">
    @include('partials.sidebar')
    <div class="col-lg-8">
      <div class="padding-top-2x mt-2 hidden-lg-up"></div>
      <div class="table-responsive">
        <table class="table table-hover mb-0">
          <thead>
            <tr>
              <th>Order #</th>
              <th>Date Purchased</th>
              <th>Status</th>
              <th>Total</th>
            </tr>
          </thead>
          <tbody>
            @foreach($orders as $order)
            <tr>
              <td><a class="navi-link" href="#" data-toggle="modal" data-target="#orderDetails">{{ $order->order_no }}</a></td>
              <td>{{ $order->created_at->diffForHumans() }}</td>
              <td><span class="text-danger">{{ $order->order_status }}</span></td>
              <td><span>${{ $order->amount }}</span></td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <hr>
    </div>
  </div>
</div>
@endsection