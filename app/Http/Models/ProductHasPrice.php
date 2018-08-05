<?php

namespace Hardware\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Hardware\Http\Models\Product;

class ProductHasPrice extends Model
{
    public function product () {
    	return $this->belongsTo(Product::class);
    }
}
