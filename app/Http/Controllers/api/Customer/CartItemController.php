<?php

namespace App\Http\Controllers\api\Customer;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Requests\Customer\Cart\StoreItem;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CartItemController extends Controller
{
    public function store(StoreItem $request)
    {
        try {

            $data = $request->validated();


            $cart = Cart::firstOrCreate(
                ['customer_id' => auth()->user()->user_id, 'status' => 'open']

            );
            $product = Product::find($data['product_id']);
            CartItem::create([
                'cart_id' => $cart->id,
                'product_id' => $data['product_id'],
                'quantity' => $data['quantity'],
                'price' => $product['price'],
                'total_price' => $product['price'] * $data['quantity'],


            ]);
        } catch (\Exception $exception) {
            dd($exception->getMessage());

            Log::error($exception->getMessage());
            return ResponseFormatter::error("an error occurred");
        }

    }

    public function destroy(CartItem $CartItem)
    {
        try {
            $CartItem->delete();

        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return ResponseFormatter::error("an error occurred");
        }
    }

    public function update(Request $request, CartItem $CartItem)
    {

        try {
            $CartItem->update(['quantity'=> $request->quantity]);
            return ResponseFormatter::success("item updated successfully",$CartItem);
        }
        catch (\Exception $exception){
            Log::error($exception->getMessage());
            return ResponseFormatter::error("an error occurred");
        }


    }
}
