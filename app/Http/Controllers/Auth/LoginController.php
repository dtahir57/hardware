<?php

namespace Hardware\Http\Controllers\Auth;

use Hardware\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Hardware\Http\Models\Category;
use Cart;
use Hardware\Http\Models\Manufacturer;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        $cartItems = Cart::content();
        $categories = Category::where('is_active', 1)->get();
        $top_categories = Category::orderBy('id', 'desc')->take(5)->get();
        $brands = Manufacturer::orderBy('id', 'desc')->take(5)->get();
        return view('auth.login', compact('categories', 'cartItems', 'top_categories', 'brands'));
    }
}
