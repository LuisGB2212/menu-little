<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'id' => 1,
	        'category_name' => 'ENTRADAS', 
	        'position' => 1,
        ]);
		DB::table('categories')->insert([
            'id' => 2,
			'category_name' => 'PLATOS FUERTES',
			'position' => 2,
		]);
		DB::table('categories')->insert([
            'id' => 3,
			'category_name' => 'POSTRES',
			'position' => 3,
		]);
		DB::table('categories')->insert([
            'id' => 4,
			'category_name' => 'JUGOS',
			'position' => 4,
		]);
		DB::table('categories')->insert([
            'id' => 5,
			'category_name' => 'GASEOSAS',
			'position' => 5,
		]);
		DB::table('categories')->insert([
            'id' => 6,
			'category_name' => 'COCTELES',
			'position' => 6,
		]);
		DB::table('categories')->insert([
            'id' => 7,
			'category_name' => 'CERVEZAS',
			'position' => 7,
		]);
		DB::table('categories')->insert([
            'id' => 8,
			'category_name' => 'LICORES',
			'position' => 8,
		]);
    }
}
