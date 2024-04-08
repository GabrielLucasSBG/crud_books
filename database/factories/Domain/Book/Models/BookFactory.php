<?php

namespace Database\Factories\Domain\Book\Models;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Domain\Book\Models\Book;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<Book>
 */
class BookFactory extends Factory
{
    protected $model = Book::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'isbn' => fake()->randomDigit(),
            'value' => fake()->randomFloat(2, 1, 1000)
        ];
    }
}
