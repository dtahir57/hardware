<?php

namespace Hardware\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Hardware\Http\Models\Product;

class Manufacturer extends Model
{
    public function products () {
    	return $this->hasMany(Product::class);
    }
}
