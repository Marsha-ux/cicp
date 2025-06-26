<?php

namespace App\Observers;

use App\Jobs\RefreshCategoryPathJob;
use App\Models\Product;

class ProductObserver
{
    public function created(Product $product) {

        RefreshCategoryPathJob::dispatch($product->category, 1);
    
    }

    
    public function deleted(Product $product) {

        RefreshCategoryPathJob::dispatch($product->category, -1);

    }
}
