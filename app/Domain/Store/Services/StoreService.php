<?php

namespace App\Domain\Store\Services;

use App\Domain\Store\Repositories\StoreRepository;

class StoreService
{
    protected $storeRepository;

    public function __construct(StoreRepository $storeRepository)
    {
        $this->storeRepository = $storeRepository;
    }

    public function getAllStores()
    {
        return $this->storeRepository->getAll();
    }

    public function createStore(array $data)
    {
        return $this->storeRepository->create($data);
    }

    public function updateStore($id, array $data)
    {
        return $this->storeRepository->update($id, $data);
    }

    public function deleteStore($id)
    {
        return $this->storeRepository->delete($id);
    }

    public function findById($id)
    {
        return $this->storeRepository->findById($id);
    }
}
