<?php

namespace App\Domain\BookStore\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookStore extends Model
{
    use HasFactory;

    protected $table = 'book_stores';
}
