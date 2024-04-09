<?php

namespace App\Domain\Book\Models;

use App\Domain\Store\Models\Store;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    public function stores()
    {
        return $this->belongsToMany(Store::class, 'book_stores', 'book_id', 'store_id');
    }

    protected $fillable = ['name', 'value', 'isbn'];
}
