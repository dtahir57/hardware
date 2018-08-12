@extends('layouts.app')

@section('title', 'Cart')

@section('content')
<div class="page-title">
  <div class="container">
    <div class="column">
      <h1>Cart</h1>
    </div>
    <div class="column">
      <ul class="breadcrumbs">
        <li><a href="{{ url('/') }}">Home</a>
        </li>
        <li class="separator">&nbsp;</li>
        <li>Cart</li>
      </ul>
    </div>
  </div>
</div>
<div class="container padding-bottom-3x mb-1">
  <!-- Shopping Cart-->
  <div class="table-responsive shopping-cart">
    <table class="table">
      <thead>
        <tr>
          <th>Product Name</th>
          <th class="text-center">Quantity</th>
          <th class="text-center">Update Cart</th>
          <th class="text-center">Subtotal</th>
          <th class="text-center">Discount</th>
          <th class="text-center"><a class="btn btn-sm btn-outline-danger" href="{{ route('cart.flush') }}">Clear Cart</a></th>
        </tr>
      </thead>
      <tbody>
      	@foreach($cartItems as $cartItem)
        <tr>
          <td>
            <div class="product-item"><a class="product-thumb" href="shop-single.html"><img src="{{ Storage::url($cartItem->options->image) }}" alt="Product"></a>
              <div class="product-info">
                <h4 class="product-title"><a href="shop-single.html">{{ $cartItem->name }}</a></h4><span><em>Type:</em> Mirrorless</span><span><em>Color:</em> Black</span>
              </div>
            </div>
          </td>
          <form method="POST" action="{{ route('cart.update', $cartItem->rowId) }}">
            @csrf
            <input type="hidden" name="_method" value="PATCH">
          <td class="text-center">
            <div class="count-input">
              <input type="number" name="qty" min="1" value="{{ $cartItem->qty }}" class="form-control" />
            </div>
          </td>
          <td class="text-center">
          	<button class="btn btn-secondary" type="submit">Update Cart</button>
          </td>
          </form>
          <td class="text-center text-lg">${{ Cart::subtotal() }}</td>
          <td class="text-center text-lg">$35.00</td>
          <td class="text-center"><a class="remove-from-cart" href="{{ route('cart.remove', $cartItem->rowId) }}" data-toggle="tooltip" title="Remove item"><i class="icon-x"></i></a></td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <div class="shopping-cart-footer">
    <div class="column">
      <form class="coupon-form" method="post">
        <input class="form-control form-control-sm" type="text" placeholder="Coupon code" required>
        <button class="btn btn-outline-primary btn-sm" type="submit">Apply Coupon</button>
      </form>
    </div>
    <div class="column text-lg"><span class="text-muted">Subtotal:&nbsp; </span><span class="text-gray-dark">${{ Cart::subtotal() }}</span></div>
  </div>
  <div class="column">
      <a class="btn btn-outline-secondary" href="{{ route('shop.index') }}"><i class="icon-arrow-left"></i>&nbsp;Back to Shopping</a>
    </div>
  @if(Cart::subtotal() > 0)
  <form action="{{ route('checkout.index') }}" method="GET">
    @csrf
  <div class="shopping-cart-footer">
    <div class="row">
      <h4>Please Choose Payment Method</h4>
    </div>
    <div class="row">
      <div class="form-group col-sm-4">
        <label class="control-label">
        <input type="radio" name="payment_method" checked value="paypal" />Paypal
        </label>
      </div>
      <div class="form-group col-sm-4">
        <label class="control-label">
        <input type="radio" name="payment_method" value="stripe" />Stripe
        </label>
      </div>
      <div class="form-group col-sm-4">
        <label class="control-label">
        <input type="radio" name="payment_method" value="cod" />COD
        </label>
      </div>
    </div>
    <div class="column">
      <button class="btn btn-primary" type="submit">Checkout</button>
    </div>
  </div>
</form>
@endif
  <!-- Related Products Carousel-->
  <h3 class="text-center padding-top-2x mt-2 padding-bottom-1x">You May Also Like</h3>
  <!-- Carousel-->
  <div class="owl-carousel" data-owl-carousel="{ &quot;nav&quot;: false, &quot;dots&quot;: true, &quot;margin&quot;: 30, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:1},&quot;576&quot;:{&quot;items&quot;:2},&quot;768&quot;:{&quot;items&quot;:3},&quot;991&quot;:{&quot;items&quot;:4},&quot;1200&quot;:{&quot;items&quot;:4}} }">
    <!-- Product-->
    <div class="product-card">
      <div class="product-badge bg-danger">Sale</div><a class="product-thumb" href="shop-single.html"><img src="img/shop/products/01.jpg" alt="Product"></a>
      <div class="product-card-body">
        <div class="product-category"><a href="#">Smart home</a></div>
        <h3 class="product-title"><a href="shop-single.html">Echo Dot (2nd Generation)</a></h3>
        <h4 class="product-price">
          <del>$62.00</del>$49.99
        </h4>
      </div>
      <div class="product-button-group"><a class="product-button btn-wishlist" href="#"><i class="icon-heart"></i><span>Wishlist</span></a><a class="product-button btn-compare" href="#"><i class="icon-repeat"></i><span>Compare</span></a><a class="product-button" href="#" data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-check-circle" data-toast-title="Product" data-toast-message="successfuly added to cart!"><i class="icon-shopping-cart"></i><span>To Cart</span></a></div>
    </div>
    <!-- Product-->
    <div class="product-card"><a class="product-thumb" href="shop-single.html"><img src="img/shop/products/11.jpg" alt="Product"></a>
      <div class="product-card-body">
        <div class="product-category"><a href="#">Headphones</a></div>
        <h3 class="product-title"><a href="shop-single.html">Edifier W855BT Bluetooth</a></h3>
        <h4 class="product-price">$99.75</h4>
      </div>
      <div class="product-button-group"><a class="product-button btn-wishlist" href="#"><i class="icon-heart"></i><span>Wishlist</span></a><a class="product-button btn-compare" href="#"><i class="icon-repeat"></i><span>Compare</span></a><a class="product-button" href="#" data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-check-circle" data-toast-title="Product" data-toast-message="successfuly added to cart!"><i class="icon-shopping-cart"></i><span>To Cart</span></a></div>
    </div>
    <!-- Product-->
    <div class="product-card">
        <div class="rating-stars"><i class="icon-star filled"></i><i class="icon-star filled"></i><i class="icon-star filled"></i><i class="icon-star filled"></i><i class="icon-star filled"></i>
        </div><a class="product-thumb" href="shop-single.html"><img src="img/shop/products/06.jpg" alt="Product"></a>
      <div class="product-card-body">
        <div class="product-category"><a href="#">Video games</a></div>
        <h3 class="product-title"><a href="shop-single.html">Xbox One S White</a></h3>
        <h4 class="product-price">$298.99</h4>
      </div>
      <div class="product-button-group"><a class="product-button btn-wishlist" href="#"><i class="icon-heart"></i><span>Wishlist</span></a><a class="product-button btn-compare" href="#"><i class="icon-repeat"></i><span>Compare</span></a><a class="product-button" href="#" data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-check-circle" data-toast-title="Product" data-toast-message="successfuly added to cart!"><i class="icon-shopping-cart"></i><span>To Cart</span></a></div>
    </div>
    <!-- Product-->
    <div class="product-card"><a class="product-thumb" href="shop-single.html"><img src="img/shop/products/07.jpg" alt="Product"></a>
      <div class="product-card-body">
        <div class="product-category"><a href="#">Smartphones</a></div>
        <h3 class="product-title"><a href="shop-single.html">Samsung Galaxy S9+</a></h3>
        <h4 class="product-price">$839.99</h4>
      </div>
      <div class="product-button-group"><a class="product-button btn-wishlist" href="#"><i class="icon-heart"></i><span>Wishlist</span></a><a class="product-button btn-compare" href="#"><i class="icon-repeat"></i><span>Compare</span></a><a class="product-button" href="#" data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-check-circle" data-toast-title="Product" data-toast-message="successfuly added to cart!"><i class="icon-shopping-cart"></i><span>To Cart</span></a></div>
    </div>
    <!-- Product-->
    <div class="product-card">
      <div class="product-badge bg-secondary border-default text-body">Out of stock</div><a class="product-thumb" href="shop-single.html"><img src="img/shop/products/12.jpg" alt="Product"></a>
      <div class="product-card-body">
        <div class="product-category"><a href="#">Wearable electornics</a></div>
        <h3 class="product-title"><a href="shop-single.html">Apple Watch Series 3</a></h3>
        <h4 class="product-price">$329.10</h4>
      </div>
      <div class="product-button-group"><a class="product-button btn-wishlist" href="#"><i class="icon-heart"></i><span>Wishlist</span></a><a class="product-button btn-compare" href="#"><i class="icon-repeat"></i><span>Compare</span></a><a class="product-button" href="shop-single.html"><i class="icon-arrow-right"></i><span>Details</span></a></div>
    </div>
    <!-- Product-->
    <div class="product-card">
        <div class="rating-stars"><i class="icon-star filled"></i><i class="icon-star filled"></i><i class="icon-star filled"></i><i class="icon-star filled"></i><i class="icon-star"></i>
        </div><a class="product-thumb" href="shop-single.html"><img src="img/shop/products/10.jpg" alt="Product"></a>
      <div class="product-card-body">
        <div class="product-category"><a href="#">Printers &amp; Ink</a></div>
        <h3 class="product-title"><a href="shop-single.html">HP LaserJet Pro Printer</a></h3>
        <h4 class="product-price">$249.50</h4>
      </div>
      <div class="product-button-group"><a class="product-button btn-wishlist" href="#"><i class="icon-heart"></i><span>Wishlist</span></a><a class="product-button btn-compare" href="#"><i class="icon-repeat"></i><span>Compare</span></a><a class="product-button" href="#" data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-check-circle" data-toast-title="Product" data-toast-message="successfuly added to cart!"><i class="icon-shopping-cart"></i><span>To Cart</span></a></div>
    </div>
    <!-- Product-->
    <div class="product-card">
      <div class="product-badge bg-danger">Sale</div><a class="product-thumb" href="shop-single.html"><img src="img/shop/products/09.jpg" alt="Product"></a>
      <div class="product-card-body">
        <div class="product-category"><a href="#">Action cameras</a></div>
        <h3 class="product-title"><a href="shop-single.html">Samsung Gear 360 Camera</a></h3>
        <h4 class="product-price">
          <del>$74.00</del>$68.00
        </h4>
      </div>
      <div class="product-button-group"><a class="product-button btn-wishlist" href="#"><i class="icon-heart"></i><span>Wishlist</span></a><a class="product-button btn-compare" href="#"><i class="icon-repeat"></i><span>Compare</span></a><a class="product-button" href="#" data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-check-circle" data-toast-title="Product" data-toast-message="successfuly added to cart!"><i class="icon-shopping-cart"></i><span>To Cart</span></a></div>
    </div>
  </div>
</div>
@endsection