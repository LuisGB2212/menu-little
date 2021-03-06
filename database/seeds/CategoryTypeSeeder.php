<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category_types')->insert([
			'category_id' => 1,
			'type_id' => 1,
        ]);
        DB::table('category_types')->insert([
			'category_id' => 2,
			'type_id' => 1,
        ]);
        DB::table('category_types')->insert([
			'category_id' => 3,
			'type_id' => 1,
        ]);
        
        DB::table('category_types')->insert([
			'category_id' => 4,
			'type_id' => 2,
        ]);
        DB::table('category_types')->insert([
			'category_id' => 5,
			'type_id' => 2,
        ]);
        DB::table('category_types')->insert([
			'category_id' => 6,
			'type_id' => 2,
        ]);
        DB::table('category_types')->insert([
			'category_id' => 7,
			'type_id' => 2,
        ]);
        DB::table('category_types')->insert([
			'category_id' => 8,
			'type_id' => 2,
		]);
    }
}
