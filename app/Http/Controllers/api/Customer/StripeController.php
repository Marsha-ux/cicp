<?php

namespace App\Http\Controllers\api\Customer;

use App\Http\Controllers\Controller;

class StripeController extends Controller
{
    public function success(){
        return response()->json(['message' => 'Payment successful']);
    }

    public function cancel(){
        return response()->json(['message' => 'Payment cancelled']);
    }
}
