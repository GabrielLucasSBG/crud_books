<?php

namespace App\Domain\Book\Services;

use App\Domain\Book\Repositories\BookRepository;

class BookService
{
    protected $bookRepository;

    public function __construct(BookRepository $bookRepository)
    {
        $this->bookRepository = $bookRepository;
    }

    public function getAllBooks()
    {
        return $this->bookRepository->getAll();
    }

    public function createBook(array $data)
    {
        return $this->bookRepository->create($data);
    }

    public function updateBook($id, array $data)
    {
        return $this->bookRepository->update($id, $data);
    }

    public function deleteBook($id)
    {
        return $this->bookRepository->delete($id);
    }

    public function findById($id)
    {
        return $this->bookRepository->findById($id);
    }
}
