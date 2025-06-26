<?php

namespace App\Http\Controllers\api\Customer;

use App\Http\Controllers\Controller;
use App\Models\Product;

class ProductController extends Controller
{

    public function get()
    {
        return Product::with('category')->get();
    }

}
