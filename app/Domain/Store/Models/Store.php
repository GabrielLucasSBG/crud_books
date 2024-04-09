<?php

namespace App\Domain\Store\Models;

use App\Domain\Book\Models\Book;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    public function books()
    {
        return $this->belongsToMany(Book::class, 'book_stores', 'store_id', 'book_id');
    }
}
