<?php

namespace Hardware\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Hardware\Http\Models\Product;

class Tag extends Model
{
    public function tags () {
    	return $this->belongsToMany(Product::class);
    }
}
