<?php

namespace App\Domain\Store\Repositories;

use App\Domain\Store\Models\Store;

class StoreRepository
{
    public function getAll()
    {
        return Store::all();
    }

    public function create(array $data)
    {
        return Store::create($data);
    }

    public function findById($id)
    {
        return Store::find($id);
    }

    public function update($id, array $data)
    {
        $store = Store::find($id);

        if ($store) {
            $store->update($data);
            return $store;
        }

        return null;
    }

    public function delete($id)
    {
        $store = Store::find($id);

        if ($store) {
            $store->delete();
            return $store;
        }

        return null;
    }
}
