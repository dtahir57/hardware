<?php

namespace Hardware\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Hardware\Http\Models\Product;
use Hardware\User;
use Hardware\Http\Models\Cart as BaseCart;

class Order extends Model
{
    public function products () {
    	return $this->belongsToMany(Product::class);
    }
    public function user () {
    	return $this->belongsTo(User::class);
    }

    public function items () {
    	return $this->hasMany(BaseCart::class, 'order_id');
    }
}
