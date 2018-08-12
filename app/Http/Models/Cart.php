<?php

namespace Hardware\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Hardware\Http\Models\Order;

class Cart extends Model
{
    public function order () {
    	return $this->belongsTo(Order::class, 'order_id');
    }
}
