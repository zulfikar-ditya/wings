<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Where the folder view will be rendered
     */
    protected string $view = 'client';

    /**
     * Show index pages
     */
    public function index()
    {
        $products = Product::withCount(['transactionDetails'])
            ->orderBy('transaction_details_count', 'desc')
            ->orderBy('id', 'desc')
            ->limit(20)
            ->get('products.*');

        return view("$this->view.index", compact('products'));
    }

    /**
     * Show Product Detail
     */
    public function show($product_id)
    {
        $product = Product::findOrFail($product_id);
        $buyCount = TransactionDetail::where('product_id', $product->id)->sum('quantity');

        $products = Product::withCount(['transactionDetails'])
            ->whereNot('id', $product->id)
            ->orderBy('transaction_details_count', 'desc')
            ->orderBy('id', 'desc')
            ->limit(20)
            ->get('products.*');
        return view("$this->view.show", compact('product', 'buyCount', 'products'));
    }

    /**
     * Checkout pages
     */
    public function checkout($product_id)
    {
        $product = Product::findOrFail($product_id);
        $buyCount = TransactionDetail::where('product_id', $product->id)->sum('quantity');

        $products = Product::withCount(['transactionDetails'])
            ->whereNot('id', $product->id)
            ->orderBy('transaction_details_count', 'desc')
            ->orderBy('id', 'desc')
            ->limit(20)
            ->get('products.*');

        return view("$this->view.checkout", compact('product', 'buyCount', 'products'));
    }
}
