<?php

namespace App\Http\Controllers\Report;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
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
    protected string $view = 'report';

    /**
     * Show index pages
     */
    public function index()
    {
        if (Auth::user()->user != 'admin') {
            abort(403);
        }

        return view("$this->view.index");
    }

    /**
     * Get report detail
     */
    public function show(Request $request)
    {
        if (Auth::user()->user != 'admin') {
            abort(403);
        }

        $model = DB::table('transaction_details')
            ->leftJoin('transactions', 'transactions.id', '=', 'transaction_details.transaction_id')
            ->leftJoin('products', 'products.id', '=', 'transaction_details.product_id')
            ->leftJoin('users', 'users.id', '=', 'transactions.user_id')
            ->when($request->from, function ($query) use ($request) {
                dd($request->from);
                return $query->whereDate('transactions.date', '>=', $request->from);
            })
            ->when($request->to_date, function ($query) use ($request) {
                return $query->whereDate('transactions.date', '<=', $request->to_date);
            })
            ->when($request->user_id, function ($query, $user_id) {
                return $query->where('transactions.user_id', $user_id);
            })
            ->when($request->product_id, function ($query, $product_id) {
                return $query->where('transaction_details.product_id', $product_id);
            })
            ->whereNull('transactions.deleted_at')
            ->selectRaw('
                transactions.code,
                transactions.date,

                users.user as user_name,

                products.name as product_name,
                products.code as product_code,

                transaction_details.quantity,
                transaction_details.price,
                transaction_details.total
            ')
            ->get();

        return view("$this->view.show", compact('model'));
    }
}
