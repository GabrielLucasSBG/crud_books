<?php

namespace App\Domain\Book\Repositories;

use App\Domain\Book\Models\Book;

class BookRepository
{
    public function getAll()
    {
        return Book::with('stores')->get();
    }

    public function create(array $data)
    {
        return Book::create($data);
    }

    public function findById($id)
    {
        return Book::find($id);
    }

    public function update($id, array $data)
    {
        $book = Book::find($id);

        if ($book) {
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
