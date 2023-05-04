<?php

namespace App\Http\Controllers\Select;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SelectController extends Controller
{
    /**
     * Select api for users
     */
    public function users(Request $request)
    {
        $users = \App\Models\User::select('id', 'user')
            ->when($request->Search, function ($query, $search) {
                return $query->where('user', 'like', "%$search%");
            })
            ->orderByDesc('id')
            ->limit(10)
            ->get();

        return $this->responseJsonData($users);
    }

    /**
     * Select api for products
     */
    public function products(Request $request)
    {
        $products = \App\Models\Product::select('id', 'name')
            ->when($request->Search, function ($query, $search) {
                return $query->where('name', 'like', "%$search%")
                    ->orWhere('code', 'like', "%$search%");
            })
            ->orderByDesc('id')
            ->limit(10)
            ->get();

        return $this->responseJsonData($products);
    }
}
