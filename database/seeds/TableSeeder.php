<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tables')->insert([
			'name' => 'Mesa',
			'number' => 1,
        ]);
        DB::table('tables')->insert([
			'name' => 'Mesa',
			'number' => 2,
        ]);
        DB::table('tables')->insert([
			'name' => 'Mesa',
			'number' => 3,
		]);
    }
}
