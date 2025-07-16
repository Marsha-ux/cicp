<?php

namespace App\Http\Controllers\web\Merchant;

use App\Models\OrderItem;

class OrderItemController
{

    public function index(){
        $orderItems = OrderItem::with(['product.mainImage', 'product.category'])
        ->where('merchant_id', '=', auth()->user()->user_id)
        ->latest()
        ->get();

        return view('merchant.order_items', ['orderItems' => $orderItems]);
    }

    public function completeOrderItem(OrderItem $orderItem){
        
        $orderItem->update([
            'status' => 'completed'
        ]);

        return back(); 
    }
}