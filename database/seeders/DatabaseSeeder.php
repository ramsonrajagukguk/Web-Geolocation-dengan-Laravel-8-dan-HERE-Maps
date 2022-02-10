<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Penulis;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesTableSeeder::class);
        $this->call(AdminUserSeeder::class);
        Penulis::factory(10)->create();
        Book::factory(20)->create();
        
    }
}