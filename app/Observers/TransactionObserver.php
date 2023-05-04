<?php

namespace App\Observers;

use App\Models\Transaction;

class TransactionObserver
{
    /**
     * Handle the Transaction "creating" event.
     */
    public function creating(Transaction $product): void
    {
        $modelBefore = Transaction::orderBy('id', 'desc')->first();

        if ($modelBefore) {
            $code = $modelBefore->code;
            $explode = (int) explode('-', $code)[1];
            $product->code = 'TRX-' . str_pad($explode + 1, 5, '0', STR_PAD_LEFT);
        } else {
            $product->code = 'TRX-' . str_pad(1, 5, '0', STR_PAD_LEFT);
        }
    }

    /**
     * Handle the Transaction "created" event.
     */
    public function created(Transaction $transaction): void
    {
        //
    }

    /**
     * Handle the Transaction "updated" event.
     */
    public function updated(Transaction $transaction): void
    {
        //
    }

    /**
     * Handle the Transaction "deleted" event.
     */
    public function deleted(Transaction $transaction): void
    {
        //
    }

    /**
     * Handle the Transaction "restored" event.
     */
    public function restored(Transaction $transaction): void
    {
        //
    }

    /**
     * Handle the Transaction "force deleted" event.
     */
    public function forceDeleted(Transaction $transaction): void
    {
        //
    }
}
