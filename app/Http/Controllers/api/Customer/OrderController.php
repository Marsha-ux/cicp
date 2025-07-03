<?php

namespace App\Http\Controllers\api\Customer;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;

class OrderController extends Controller
{
    // pending, processing, completed 
    public function checkout(CheckoutRequest $request)
    {
        $shippingAddressId = $request->shipping_address_id;

        $customerCard = Cart::with(['cartItems.product'])
            ->where(['customer_id' => auth()->user()->user_id, 'status' => 'open'])
            ->first();
        
        if(!$customerCard) return 'empty card';

        $cardItems = $customerCard->cartItems;

        if(count($cardItems) == 0) return 'empty card';

    
        $order = Order::query()->create([
            'customer_id' => $request->user()->user_id,
            'status' => 'pending',
            'shipping_address_id' => $shippingAddressId,
            'amount' => $cardItems->sum('amount')
        ]);


        $orderItemsData = collect($cardItems)->only(['product_id', 'quantity', 'price']);
        /** @var Order $order */
        $order->orderItems()->createMany($orderItemsData);


        // create stripe payment intent

        $stripe = new \Stripe\StripeClient('');

        $paymentIntent = $stripe->paymentIntents->create([
            'amount' => $order->amount,
            'currency' => 'usd',
            'automatic_payment_methods' => ['enabled' => true],
        ]);
        
    }

}
