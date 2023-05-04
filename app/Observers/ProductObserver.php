<?php

namespace App\Observers;

use App\Models\Product;

class ProductObserver
{
    /**
     * Handle the Product "creating" event.
     */
    public function creating(Product $product): void
    {
        $modelBefore = Product::orderBy('id', 'desc')->first();

        if ($modelBefore) {
            $code = $modelBefore->code;
            $explode = (int) explode('P', $code)[1];
            $product->code = 'P' . str_pad($explode + 1, 5, '0', STR_PAD_LEFT);
        } else {
            $product->code = 'P' . str_pad(1, 5, '0', STR_PAD_LEFT);
        }
    }

    /**
     * Handle the Product "created" event.
     */
    public function created(Product $product): void
    {
        //
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
        //
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
