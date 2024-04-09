<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Domain\Book\Models\Book;
use App\Domain\BookStore\Models\BookStore;
use App\Domain\Store\Models\Store;
use Illuminate\Database\Seeder;
use App\Domain\User\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Domain\User\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com'
        ]);

         User::factory(10)->create();
         Book::factory(10)->create();
         Store::factory(10)->create();
         BookStore::factory(10)->create();
    }
}
