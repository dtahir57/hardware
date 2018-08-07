<?php

namespace Hardware\Http\Controllers;

use Illuminate\Http\Request;
use Hardware\Http\Models\Category;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::where('is_active', 1)->get();
        return view('home', compact('categories'));
    }
}
