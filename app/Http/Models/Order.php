<?php

namespace Hardware\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Hardware\Http\Models\Product;
use Hardware\User;

class Order extends Model
{
    public function products () {
    	return $this->belongsToMany(Product::class);
    }
    public function order () {
    	return $this->belongsTo(User::class);
    }
}
