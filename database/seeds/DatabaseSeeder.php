<?php

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
        $this->call([
            CategorySeeder::class,
            TypeSeeder::class,
            CategoryTypeSeeder::class,
            DrinkFoodSeeder::class,
            TableSeeder::class,
            TypeUserSeeder::class,
            UserSeeder::class,
            TypeOrderSeeder::class,
        ]);
    }
}
