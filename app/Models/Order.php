<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    protected $guarded = [];


    public function orderItems(): HasMany{
        return $this->hasMany(OrderItem::class);
    }

    public function customer() : BelongsTo {
        return $this->belongsTo(Customer::class);
    }
    
    public function shippingAddress() : BelongsTo {
        return $this->belongsTo(ShippingAddress::class);
    }

}
