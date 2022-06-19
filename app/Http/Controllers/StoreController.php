<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function getStores(Request $request)
    {
        $storeIds = $request->get('store_ids');
        if (!is_array($storeIds)) {
            $storeIds = json_decode($storeIds);
        }
        return Store::whereIn('id', $storeIds)->get();
    }

    public function store(Request $request)
    {
        return Store::create([
            'user_id' => $request->user_id,
            'name' => $request->name,
            'description' => null,
            'rate'=> 0,
            'total_product' => 0
        ]);
    }

    public function show($id)
    {
        $store = Store::find($id);
        if (!$store) {
            return $this->errorResponse('Store Not found', 404);
        }
        return $store;
    }

    public function showByUser($id)
    {
        return Store::where('user_id', $id)->first();
    }
}
