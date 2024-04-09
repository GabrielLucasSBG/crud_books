<?php

namespace App\Domain\Book\Repositories;

use App\Domain\Book\Models\Book;
use Carbon\Carbon;

class BookRepository
{
    public function getAll()
    {
        return Book::with('stores')->get();
    }

    public function create(array $data)
    {
        $book = Book::create($data);

        $storeIds = $data['store_ids'];

        foreach ($storeIds as $storeId) {
            $book->stores()->attach($storeId, ['created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
        }

        return $book;
    }

    public function findById($id)
    {
        return Book::where('id', $id)->with('stores')->get();
    }

    public function update($id, array $data)
    {
        $book = Book::find($id);
        $storeIds = $data['store_ids'];

        if ($book) {
            if ($storeIds) {
                foreach ($storeIds as $storeId) {
                    if ($book->stores()->exists()) {
                        $bookStores = $book->stores()->get();

                        foreach ($bookStores as $bookStore) {
                            $book->stores()->updateExistingPivot($bookStore->id, ['store_id' => $storeId]);
                        }
                    } else {
                        $book->stores()->attach($storeId, ['created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
                    }
                }
            }

            $book->update($data);
            return $book;
        }

        return null;
    }

    public function delete($id)
    {
        $book = Book::find($id);

        if ($book) {
            $book->delete();
            return $book;
        }

        return null;
    }
}
