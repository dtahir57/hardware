<?php

namespace Hardware\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use View;
use Hardware\Http\Models\Manufacturer;
use Hardware\Http\Models\Category;
use Cart;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
    	$cartItems = Cart::content();
    	$categories = Category::where('is_active', 1)->get();
    	$top_categories = Category::orderBy('id', 'desc')->take(5)->get();
    	$brands = Manufacturer::orderBy('id', 'desc')->take(5)->get();
    	View::share(['cartItems' => $cartItems, 'categories' => $categories, 'top_categories' => $top_categories, 'brands' => $brands]);
    }
}
