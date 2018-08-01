<?php

namespace Hardware\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Hardware\Http\Models\Category;
use Hardware\Http\Models\Manufacturer;

class Product extends Model
{
    public function categories () {
    	return $this->belongsToMany(Category::class);
    }

    public function manufacturer () {
    	return $this->belongsTo(Manufacturer::class);
    }
}
