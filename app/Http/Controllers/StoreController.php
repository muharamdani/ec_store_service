<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateStoreRequest;
use App\Models\Store;

class StoreController extends Controller
{
    public function index()
    {
        // Paginate Stores result, default 10 data/page
        return Store::paginate(request()->get('per_page', 10));
    }

    public function store(CreateStoreRequest $request)
    {
        $req = $request->validated();

        // Check user availability
        $user_id = $req['user_id'];
        $name = $req['name'];
        $store = Store::where('user_id', $user_id)->first();

        if ($store) {
            return response()->json([
                'message' => 'Store for that user is already exist'
            ], 403);
        }

        return Store::create([
            'user_id' => $user_id,
            'name' => $name,
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
