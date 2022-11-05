<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
   
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            UsersTableSeeder::class
        ]);

        // \App\Models\Author::factory(10)->create();
        // \App\Models\Category::factory(10)->create();
        //\App\Models\Book::factory(50)->create();
    }
    
}
