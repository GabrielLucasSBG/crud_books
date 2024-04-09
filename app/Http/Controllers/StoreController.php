<?php

namespace App\Http\Controllers;

use App\Domain\Store\Services\StoreService;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    protected $storeService;

    public function __construct(StoreService $storeService)
    {
        $this->storeService = $storeService;
    }

    public function index()
    {
        try {
            $stores = $this->storeService->getAllStores();
            return response()->json(['stores' => $stores]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'address' => 'required|string',
            'name' => 'required|string'
        ]);

        try {
            $stores = $this->storeService->createStore($request->all());
            return response()->json(['stores' => $stores], 201);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $stores = $this->storeService->updateStore($id, $request->all());
            return response()->json(['stores' => $stores]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function findById($id)
    {
        try {
            $stores = $this->storeService->findById($id);
            if (!$stores) {
                return response()->json(['error' => 'Book not found'], 404);
            }
            return response()->json(['store' => $stores]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function destroy($id)
    {
        try {
            $stores = $this->storeService->deleteStore($id);
            return response()->json("Store deleted", 204);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
}
