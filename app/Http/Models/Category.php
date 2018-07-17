<?php

namespace Hardware\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Hardware\Http\Models\Product;

class Category extends Model
{
    public function products () {
    	return $this->belongsToMany(Product::class);
    }
}
