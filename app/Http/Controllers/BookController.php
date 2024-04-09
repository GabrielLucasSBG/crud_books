<?php

namespace App\Http\Controllers;

use App\Domain\Book\Services\BookService;
use Illuminate\Http\Request;

class BookController extends Controller
{
    protected $bookService;

    public function __construct(BookService $bookService)
    {
        $this->bookService = $bookService;
    }

    public function index()
    {
        try {
            $books = $this->bookService->getAllBooks();
            return response()->json(['books' => $books]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'isbn' => 'required|numeric',
            'name' => 'required',
            'value' => 'required|numeric'
        ]);

        try {
            $books = $this->bookService->createBook($request->all());
            return response()->json(['books' => $books], 201);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $books = $this->bookService->updateBook($id, $request->all());
            return response()->json(['books' => $books]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function findById($id)
    {
        try {
            $books = $this->bookService->findById($id);
            if (!$books) {
                return response()->json(['error' => 'Book not found'], 404);
            }
            return response()->json(['book' => $books]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function destroy($id)
    {
        try {
            $books = $this->bookService->deleteBook($id);
            return response()->json('Book deleted', 204);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
}
