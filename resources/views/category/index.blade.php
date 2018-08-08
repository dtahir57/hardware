@extends('layouts.app')

@section('title', 'Shop')

@section('content')
<div class="page-title">
  <div class="container">
    <div class="column">
      <h1>Shop</h1>
    </div>
    <div class="column">
      <ul class="breadcrumbs">
        <li><a href="{{ url('/') }}">Home</a>
        </li>
        <li class="separator">&nbsp;</li>
        <li>Shop</li>
      </ul>
    </div>
  </div>
</div>
<div class="container padding-bottom-3x mb-1">
  <div class="row">
    <!-- Products-->
    <div class="col-lg-9 order-lg-2">
      <!-- Promo banner-->
      <a class="alert alert-default alert-dismissible fade show fw-section mb-30" href="shop-grid-ls.html" style="background-image: url({{ asset('frontend/img/banners/shop-banner-bg.jpg')}});"><span class="alert-close" data-dismiss="alert"></span>
        <div class="d-flex flex-wrap flex-md-nowrap justify-content-between align-items-center">
          <div class="mx-auto mx-md-0 px-3 pb-2 text-center text-md-left"><span class="d-block text-lg text-thin mb-2">Limited Time Deals</span>
            <h3 class="text-gray-dark">Surface Pro 4</h3>
            <p class="d-inline-block bg-warning text-white">&nbsp;&nbsp;Shop Now&nbsp;<i class="icon-chevron-right d-inline-block align-middle"></i>&nbsp;</p>
          </div><img class="d-block mx-auto mx-md-0" src="img/banners/shop-banner.png" alt="Surface Pro 4">
        </div></a>
      <!-- Shop Toolbar-->
      <div class="shop-toolbar padding-bottom-1x mb-2">
        <div class="column">
          <div class="shop-sorting">
            <label for="sorting">Sort by:</label>
            <select class="form-control" id="sorting">
              <option>Popularity</option>
              <option>Low - High Price</option>
              <option>High - Low Price</option>
              <option>Average Rating</option>
              <option>A - Z Order</option>
              <option>Z - A Order</option>
            </select><span class="text-muted">Showing:&nbsp;</span><span>1 - 12 items</span>
          </div>
        </div>
        <div class="column">
          <div class="shop-view"><a class="grid-view active" href="shop-grid-ls.html"><span></span><span></span><span></span></a><a class="list-view" href="shop-list-ls.html"><span></span><span></span><span></span></a></div>
        </div>
      </div>
      <!-- Products Grid-->
      <div class="row">
      	@foreach($category{0}->products as $product)
        <div class="col-md-4 col-sm-6">
          <div class="product-card mb-30">
            <a class="product-thumb" href="shop-single.html"><img src="{{ Storage::url($product->product_has_images{0}->img_url) }}" alt="Product"></a>
            <div class="product-card-body">
              <div class="product-category"><a href="#">{{ $product->categories{0}->title }}</a></div>
              <h3 class="product-title"><a href="shop-single.html">{{ $product->title }}</a></h3>
              <h4 class="product-price">
                ${{ $product->product_has_price->plc_hardware_price }}
              </h4>
            </div>
            <div class="product-button-group">
              <a class="product-button btn-wishlist" href="#">
                <i class="icon-heart"></i>
                <span>Wishlist</span>
              </a>
              <a class="product-button btn-compare" href="#">
                <i class="icon-repeat"></i>
                <span>Compare</span>
              </a>
              <a class="product-button" href="{{ route('cart.show', $product->id) }}" data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-check-circle" data-toast-title="Product" data-toast-message="successfuly added to cart!">
                <i class="icon-shopping-cart"></i>
                <span>To Cart</span>
              </a>
            </div>
          </div>
        </div>
        @endforeach
      </div>
      <!-- Pagination-->
      <nav class="pagination">
        <div class="column">
          <ul class="pages">
            <li class="active"><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li>...</li>
            <li><a href="#">12</a></li>
          </ul>
        </div>
        <div class="column text-right hidden-xs-down"><a class="btn btn-outline-secondary btn-sm" href="#">Next&nbsp;<i class="icon-chevron-right"></i></a></div>
      </nav>
    </div>
    <!-- Sidebar          -->
    <div class="col-lg-3 order-lg-1">
      <div class="sidebar-toggle position-left"><i class="icon-filter"></i></div>
      <aside class="sidebar sidebar-offcanvas position-left"><span class="sidebar-close"><i class="icon-x"></i></span>
        <!-- Widget Categories-->
        <section class="widget widget-categories">
          <h3 class="widget-title">Shop Categories</h3>
          @foreach($categories as $category)
          <ul>
            <li @if($category->childs->count() > 0) class="has-children" @endif><a @if($category->childs->count() > 0) href="#" @else href="{{ route('category.show', $category->slug) }}" @endif>{{ $category->title }}</a>
                @if($category->childs)
                  <ul>
                    @foreach($category->childs as $sub)
                    <li><a @if($sub->childs->count() > 0) href="#" @else href="{{ route('category.show', $sub->slug) }}" @endif>{{ $sub->title }}</a>
                    @if($sub->childs)
                      @foreach($sub->childs as $child_lvl_2)
                      <ul>
                        <li><a href="{{ route('category.show', $child_lvl_2->slug) }}">{{ $child_lvl_2->title }}</a></li>
                      </ul>
                      @endforeach
                    @endif
                    </li>
                    @endforeach
                  </ul>
                @endif
            </li>
          </ul>
          @endforeach
        </section>
        <!-- Widget Price Range-->
        <section class="widget widget-categories">
          <h3 class="widget-title">Price Range</h3>
          <form class="price-range-slider" method="post" data-start-min="250" data-start-max="650" data-min="0" data-max="1000" data-step="1">
            <div class="ui-range-slider"></div>
            <footer class="ui-range-slider-footer">
              <div class="column">
                <button class="btn btn-outline-primary btn-sm" type="submit">Filter</button>
              </div>
              <div class="column">
                <div class="ui-range-values">
                  <div class="ui-range-value-min">$<span></span>
                    <input type="hidden">
                  </div>&nbsp;-&nbsp;
                  <div class="ui-range-value-max">$<span></span>
                    <input type="hidden">
                  </div>
                </div>
              </div>
            </footer>
          </form>
        </section>
        <!-- Widget Size Filter-->
        <section class="widget">
          <h3 class="widget-title">Filter by Price</h3>
          <div class="custom-control custom-checkbox">
            <input class="custom-control-input" type="checkbox" id="low">
            <label class="custom-control-label" for="low">$50 - $100L&nbsp;<span class="text-muted">(208)</span></label>
          </div>
          <div class="custom-control custom-checkbox">
            <input class="custom-control-input" type="checkbox" id="middle">
            <label class="custom-control-label" for="middle">$100L - $500&nbsp;<span class="text-muted">(311)</span></label>
          </div>
          <div class="custom-control custom-checkbox">
            <input class="custom-control-input" type="checkbox" id="high">
            <label class="custom-control-label" for="high">$500 - $1,000&nbsp;<span class="text-muted">(485)</span></label>
          </div>
          <div class="custom-control custom-checkbox">
            <input class="custom-control-input" type="checkbox" id="top">
            <label class="custom-control-label" for="top">$1,000 - $5,000&nbsp;<span class="text-muted">(213)</span></label>
          </div>
        </section>
        <!-- Widget Brand Filter-->
        <section class="widget">
          <h3 class="widget-title">Filter by Brand</h3>
          @foreach($manufacturers as $manufacturer)
          <div class="custom-control custom-checkbox">
            <input class="custom-control-input" type="checkbox" id="{{ $manufacturer->name }}">
            <label class="custom-control-label" for="{{ $manufacturer->name }}">{{ $manufacturer->name }}&nbsp;<span class="text-muted">({{ $manufacturer->products->count() }})</span></label>
          </div>
          @endforeach
        </section>
      </aside>
    </div>
  </div>
</div>
@endsection