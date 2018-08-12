@extends('layouts.app')

@section('title', 'Cash On Delivery')

@section('content')
<div class="page-title">
  <div class="container">
    <div class="column">
      <h1>Checkout</h1>
    </div>
    <div class="column">
      <ul class="breadcrumbs">
        <li><a href="{{ url('/') }}">Home</a>
        </li>
        <li class="separator">&nbsp;</li>
        <li>Checkout</li>
      </ul>
    </div>
  </div>
</div>
<div class="container padding-bottom-3x mb-2">
  @foreach($errors->all() as $error)
  <li class="alert alert-danger">{{ $error }}</li>
  @endforeach
  <form action="{{ route('cod.store') }}" method="POST">
  	@csrf
    <div class="row">
      <!-- Checkout Adress-->
      <div class="col-xl-9 col-lg-8">
        <h4>Shipping Address</h4>
        <hr class="padding-bottom-1x">
        <div class="row">
          <div class="col-sm-6">
            <div class="form-group">
              <label for="checkout-fn">First Name</label>
              <input class="form-control" name="fname" type="text" id="checkout-fn">
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label for="checkout-ln">Last Name</label>
              <input class="form-control" name="lname" type="text" id="checkout-ln">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6">
            <div class="form-group">
              <label for="checkout-email">E-mail Address</label>
              <input class="form-control" name="email" type="email" id="checkout-email">
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label for="checkout-phone">Phone Number</label>
              <input class="form-control" name="phone_number" type="text" id="checkout-phone">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6">
            <div class="form-group">
              <label for="checkout-company">Company</label>
              <input class="form-control" name="company" type="text" id="checkout-company">
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label for="checkout-country">Country</label>
              <select class="form-control" name="country" id="checkout-country">
                <option>Choose country</option>
                <option>Australia</option>
                <option>Canada</option>
                <option>France</option>
                <option>Germany</option>
                <option>Switzerland</option>
                <option>USA</option>
              </select>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6">
            <div class="form-group">
              <label for="checkout-city">City</label>
              <select class="form-control" name="city" id="checkout-city">
                <option>Choose city</option>
                <option>Amsterdam</option>
                <option>Berlin</option>
                <option>Geneve</option>
                <option>New York</option>
                <option>Paris</option>
              </select>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label for="checkout-zip">ZIP Code</label>
              <input class="form-control" name="zip" type="text" id="checkout-zip">
            </div>
          </div>
        </div>
        <div class="row padding-bottom-1x">
          <div class="col-sm-6">
            <div class="form-group">
              <label for="checkout-address1">Address 1</label>
              <input class="form-control" name="address1" type="text" id="checkout-address1">
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label for="checkout-address2">Address 2</label>
              <input class="form-control" name="address2" type="text" id="checkout-address2">
            </div>
          </div>
        </div>
        <input type="hidden" name="total_price" value="" />
        <div class="d-flex justify-content-between paddin-top-1x mt-4">
        	<a class="btn btn-outline-secondary" href="{{ route('cart.index') }}">
        		<i class="icon-arrow-left"></i>
        		<span class="hidden-xs-down">&nbsp;Back To Cart</span>
        	</a>
        	<button class="btn btn-primary" type="submit">
        		<span class="hidden-xs-down">Continue&nbsp;</span>
        		<i class="icon-arrow-right"></i>
        	</button>
        </div>
      </div>
      <input type="hidden" name="payment_method" value="{{ $payment_method }}">
      <!-- Sidebar          -->
      <div class="col-xl-3 col-lg-4">
        <aside class="sidebar">
          <div class="padding-top-2x hidden-lg-up"></div>
          <!-- Order Summary Widget-->
          <section class="widget widget-order-summary">
            <h3 class="widget-title">Order Summary</h3>
            <table class="table">
              <tr>
                <td>Cart Subtotal:</td>
                <td class="text-gray-dark">${{ Cart::subtotal() }}</td>
              </tr>
              <tr>
                <td>Shipping:</td>
                <td class="text-gray-dark">$26.50</td>
              </tr>
              <tr>
                <td>Estimated tax:</td>
                <td class="text-gray-dark">$9.72</td>
              </tr>
              <tr>
                <td></td>
                <td class="text-lg text-gray-dark">$2,584.72</td>
              </tr>
            </table>
          </section>
          <!-- Featured Products Widget-->
          <section class="widget widget-featured-products">
            <h3 class="widget-title">Recently Viewed</h3>
            <!-- Entry-->
            <div class="entry">
              <div class="entry-thumb"><a href="shop-single.html"><img src="img/shop/widget/01.jpg" alt="Product"></a></div>
              <div class="entry-content">
                <h4 class="entry-title"><a href="shop-single.html">GoPro Hero4 Silver</a></h4><span class="entry-meta">$287.99</span>
              </div>
            </div>
            <!-- Entry-->
            <div class="entry">
              <div class="entry-thumb"><a href="shop-single.html"><img src="img/shop/widget/02.jpg" alt="Product"></a></div>
              <div class="entry-content">
                <h4 class="entry-title"><a href="shop-single.html">Puro Sound Labs BT2200</a></h4><span class="entry-meta">$95.99</span>
              </div>
            </div>
            <!-- Entry-->
            <div class="entry">
              <div class="entry-thumb"><a href="shop-single.html"><img src="img/shop/widget/03.jpg" alt="Product"></a></div>
              <div class="entry-content">
                <h4 class="entry-title"><a href="shop-single.html">HP OfficeJet Pro 8710</a></h4><span class="entry-meta">$89.70</span>
              </div>
            </div>
            <!-- Entry-->
            <div class="entry pb-2">
              <div class="entry-thumb"><a href="shop-single.html"><img src="img/shop/widget/05.jpg" alt="Product"></a></div>
              <div class="entry-content">
                <h4 class="entry-title"><a href="shop-single.html">iPhone X 256 GB Space Gray</a></h4><span class="entry-meta">$1,450.00</span>
              </div>
            </div>
          </section>
          <!-- Promo Banner--><a class="card border-0 bg-secondary" href="shop-grid-ls.html">
            <div class="card-body"><span class="d-block text-lg text-thin mb-2">Limited Time Deals</span>
              <h3>Surface Pro 4</h3>
              <p class="d-inline-block bg-warning text-white">&nbsp;&nbsp;Shop Now&nbsp;<i class="icon-chevron-right d-inline-block align-middle"></i>&nbsp;</p>
            </div><img class="d-block mx-auto" src="img/shop/widget/promo.jpg" alt="Surface Pro"></a>
        </aside>
      </div>
    </div>
  </form>
</div>
@endsection