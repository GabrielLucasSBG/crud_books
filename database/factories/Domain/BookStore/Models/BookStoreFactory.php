<?php

namespace Database\Factories\Domain\BookStore\Models;

use App\Domain\Book\Models\Book;
use App\Domain\BookStore\Models\BookStore;
use App\Domain\Store\Models\Store;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<BookStore>
 */
class BookStoreFactory extends Factory
{
    protected $model = BookStore::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'book_id' => Book::factory()->create()->id,
            'store_id' => Store::factory()->create()->id
        ];
    }
}
