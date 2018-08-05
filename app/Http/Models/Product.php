<?php

namespace Hardware\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Hardware\Http\Models\Category;
use Hardware\Http\Models\Manufacturer;
use Hardware\Http\Models\ProductHasPrice;
use Hardware\Http\Models\ProductHasShippingDetails;
use Hardware\Http\Models\Attribute;
use Hardware\Http\Models\Tag;
use Hardware\Http\Models\ProductHasImage;
use Hardware\Http\Models\ProductHasQuantity;

class Product extends Model
{
    public function categories () {
    	return $this->belongsToMany(Category::class);
    }

    public function manufacturer () {
    	return $this->belongsTo(Manufacturer::class);
    }

    public function product_has_price () {
    	return $this->hasOne(ProductHasPrice::class);
    }

    public function product_has_shipping_detail () {
    	return $this->belongsTo(ProductHasShippingDetails::class);
    }

    public function product_has_attributes () {
        return $this->belongsToMany(Attribute::class);
    }
    public function product_has_tags () {
        return $this->belongsToMany(Tag::class);
    }

    public function product_has_images () {
        return $this->hasMany(ProductHasImage::class);
    }

    public function product_has_quantity () {
        return $this->hasOne(ProductHasQuantity::class);
    }
}
