@extends('layouts.app')

@section('title', 'Shop')

@section('content')
<div class="page-title">
  <div class="container">
    <div class="column">
      <h1>{{ $product->name }}</h1>
    </div>
    <div class="column">
      <ul class="breadcrumbs">
        <li><a href="{{ url('/') }}">Home</a>
        </li>
        <li class="separator">&nbsp;</li>
        <li><a href="{{ route('shop.index') }}">Shop</a>
        </li>
        <li class="separator">&nbsp;</li>
        <li>{{ $product->name }}</li>
      </ul>
    </div>
  </div>
</div>
<div class="container padding-bottom-3x">
  <div class="row">
    <!-- Poduct Gallery-->
    <div class="col-md-6">
      <div class="product-gallery">
        <div class="gallery-wrapper">
        </div>
        <div class="product-carousel owl-carousel gallery-wrapper">
    	@foreach($product->product_has_images as $image)
          <div class="gallery-item" data-hash="img{{$loop->index+1}}">
          	<a href="{{ Storage::url($image->img_url) }}" data-size="1000x667">
          		<img src="{{ Storage::url($image->img_url) }}" alt="Product">
          	</a>
          </div>
        @endforeach
        </div>
        <ul class="product-thumbnails">
         @foreach($product->product_has_images as $image)
          <li><a href="#img{{$loop->index+1}}"><img src="{{ Storage::url($image->img_url) }}" alt="Product"></a></li>
         @endforeach
        </ul>
      </div>
    </div>
    <!-- Product Info-->
    <div class="col-md-6">
      <div class="padding-top-2x mt-2 hidden-md-up"></div>
      <div class="sp-categories pb-3">
      	<i class="icon-tag"></i>
      	@foreach($product->categories as $category)
      	<a href="{{ route('category.show', $category->slug) }}">{{ $category->title }}</a>
      	@endforeach
      </div>
      <h2 class="mb-3">{{ $product->name }}</h2>
      <span class="h3 d-block">$ {{ $product->product_has_price->plc_hardware_price }}</span>
      <p class="text-muted">{{ $product->long_description }}</p>
      <div class="row margin-top-1x">
      	@if($product->product_has_attributes)
      	@foreach($product->product_has_attributes as $attribute)
        <div class="col-sm-6">
          <div class="form-group">
            <label for="{{ $attribute->label }}">{{ $attribute->label }}</label>
            <{{$attribute->type}}></{{$attribute->type}}>
          </div>
        </div>
        @endforeach
        @endif
        <div class="col-sm-6">
          <div class="form-group">
            <label for="color">Battery capacity</label>
            <select class="form-control" id="color">
              <option>5100 mAh</option>
              <option>6200 mAh</option>
              <option>8000 mAh</option>
            </select>
          </div>
        </div>
      </div>
      <form action="{{ route('cart.post', $product->id) }}" method="POST">
      	@csrf
      	<div class="row align-items-end pb-4">
      	  <div class="col-sm-4">
      	    <div class="form-group mb-0">
      	      <label for="quantity">Quantity</label>
      	      <input type="number" name="qty" min="1" value="1" class="form-control" />
      	    </div>
      	  </div>
      	  <div class="col-sm-8">
      	    <div class="pt-4 hidden-sm-up"></div>
      	    <button class="btn btn-primary btn-block m-0" type="submit"><i class="icon-bag"></i> Add to Cart</button>
      	  </div>
      	</div>
      </form>
      <div class="pt-1 mb-4"><span class="text-medium">SKU:</span> #21457832</div>
      <hr class="mb-2">
      <div class="d-flex flex-wrap justify-content-between">
        <div class="mt-2 mb-2">
          <button class="btn btn-outline-secondary btn-sm btn-wishlist"><i class="icon-heart"></i>&nbsp;To Wishlist</button>
          <button class="btn btn-outline-secondary btn-sm btn-compare"><i class="icon-repeat"></i>&nbsp;Compare</button>
        </div>
        <div class="mt-2 mb-2"><span class="text-muted">Share:&nbsp;&nbsp;</span>
          <div class="d-inline-block"><a class="social-button shape-rounded sb-facebook" href="#" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="socicon-facebook"></i></a><a class="social-button shape-rounded sb-twitter" href="#" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="socicon-twitter"></i></a><a class="social-button shape-rounded sb-instagram" href="#" data-toggle="tooltip" data-placement="top" title="Instagram"><i class="socicon-instagram"></i></a><a class="social-button shape-rounded sb-google-plus" href="#" data-toggle="tooltip" data-placement="top" title="Google +"><i class="socicon-googleplus"></i></a></div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection