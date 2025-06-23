<?php

namespace App\Observers;

use App\Models\Category;
use App\Models\Product;

class ProductObserver
{
    /**
     * Handle the Product "created" event.
     */
    public function created(Product $product): void
    {
        $category=$product->category()->first();
        while($category){
            $category->increment('product_count');
            $category=$category->parent_category()->first();
        }



    }

    /**
     * Handle the Product "updated" event.
     */
    public function updated(Product $product): void
    {
        //
    }

    /**
     * Handle the Product "deleted" event.
     */
    public function deleted(Product $product): void
    {
        $category=$product->category()->first();
        while($category){
            $category->decrement('product_count');
            $category=$category->parent_category()->first();
        }
    }

    /**
     * Handle the Product "restored" event.
     */
    public function restored(Product $product): void
    {
        //
    }

    /**
     * Handle the Product "force deleted" event.
     */
    public function forceDeleted(Product $product): void
    {
        //
    }




}
