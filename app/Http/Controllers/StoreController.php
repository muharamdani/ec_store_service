<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function store(Request $request)
    {
        $store = Store::create([
            'user_id' => $request->user_id,
            'name' => $request->name,
            'description' => null,
            'rate'=> 0,
            'total_product' => 0
        ]);

        return response()->json($store);
    }

    public function show($id)
    {
        $store = Store::where('user_id', $id)->first();
        return response()->json($store);
    }
}
