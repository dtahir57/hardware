<?php

namespace Hardware\Http\Controllers\Settings;

use Illuminate\Http\Request;
use Hardware\Http\Controllers\Controller;
use Hardware\Http\Models\Product;
use Hardware\Http\Models\Category;
use Hardware\Http\Models\Manufacturer;
use Hardware\Http\Models\ProductCondition;
use Hardware\Http\Models\Attribute;
use Hardware\Http\Models\Tag;
use Hardware\Http\Models\Badge;
use Hardware\Http\Models\Unit;
use Hardware\Http\Models\EcommerceShipping;
use Hardware\Http\Requests\ProductRequest;
use Session;
use Hardware\Http\Models\ProductHasQuantity;
use Hardware\Http\Models\ProductHasPrice;
use Hardware\Http\Models\ProductHasShippingDetails;
use Hardware\Http\Models\ProductHasImage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest()->get();
        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $units = Unit::all();
        $badges = Badge::all();
        $tags = Tag::where('is_active', 1)->get();
        $product_conditions = ProductCondition::all();
        $manufacturers = Manufacturer::all();
        $categories = Category::all();
        $attributes = Attribute::all();
        $setting = EcommerceShipping::first();
        return view('admin.product.create', compact('categories', 'manufacturers', 'product_conditions', 'attributes', 'tags', 'badges', 'units', 'setting'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $product = new Product;
        $product->name = $request->name;
        $product->manufacturer_id = $request->manufacturer_id;
        $product->product_condition_id = $request->product_condition_id;
        $product->badge_id = $request->badge_id;
        $product->unit_id = $request->unit_id;
        $product->series = $request->series;
        if ($request->is_featured) {
            $product->is_featured = 1;
        } else {
            $product->is_featured = 0;
        }
        $product->long_description = $request->long_description;
        $product->notes = $request->notes;
        if ($request->hasFile('document')) {
            $product->document = $request->document->store('public/products/documents');
        }
        $product->seo_tool = $request->seo_tool;
        $product->sku = 'PLCH_'.md5(uniqid(rand(), true));
        if ($request->shippable) {
            $product->is_shippable = 1;   
        } else {
            $product->is_shippable = 0;
        }
        $product->slug = str_slug($request->name, '-');
        $product->save();

        $product_has_quantity = new ProductHasQuantity;
        $product_has_quantity->product_id = $product->id;
        $product_has_quantity->quantity = $request->quantity;
        $product_has_quantity->min_quantity_for_sale = $request->min_quantity_for_sale;
        $product_has_quantity->save();

        $price = new ProductHasPrice;
        $price->product_id = $product->id;
        $price->retail_price = $request->retail_price;
        $price->supplier_price = $request->supplier_price;

        // Calculation for the price to show on the front end of the shop
        
        $precal1 = $request->supplier_price * $request->discount;
        $LLC_COST = $request->supplier_price - $precal1;

        $precal2 = $LLC_COST * $request->import_cost;
        $Jrz_Cost = $LLC_COST + $precal2;

        $precal3 = $Jrz_Cost * $request->sales;

        $precal4 = $Jrz_Cost + $precal3;

        $precal5 = $precal4 * $request->utility;

        $plch_price = $precal4 + $precal5 + $request->packing_cost;

        //Calculation of PLCH product price
        
        $price->plc_hardware_price = $plch_price;
        $price->web_price = $plch_price * 1.16;
        $price->save();

        if ($request->shippable) {
            $shippable = new ProductHasShippingDetails;
            $shippable->product_id = $product->id;
            $shippable->width = $request->width;
            $shippable->height = $request->height;
            $shippable->length = $request->length;
            $shippable->weight = $request->weight;
            $shippable->save();
        }

        foreach($request->categories as $category) {
            $c = Category::find($category);
            $product->categories()->attach($c->id);
        }
        foreach($request->attributes as $attribute) {
            $a = Attribute::find($attribute);
            $product->product_has_attributes()->attach($a->id);
        }
        foreach($request->tags as $tag) {
            $t = Tag::find($tag);
            $product->product_has_tags()->attach($t->id);
        }
        $images = $request->file('product_img');
        if ($request->hasFile('product_img')) {
            foreach($images as $image) {
                $product_has_image = new ProductHasImage;
                $product_has_image->product_id = $product->id;
                $product_has_image->img_url = $image->store('public/products');
                $product_has_image->save();
            }
        }
        if ($product) {
            Session::flash('created' ,'Product Created Successfully');
            return redirect()->route('product.index');
        }
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
}
