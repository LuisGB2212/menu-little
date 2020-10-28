<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('types')->insert([
            'id' => 1,
			'type_name' => 'ALIMENTO',
		]);
		DB::table('types')->insert([
            'id' => 2,
			'type_name' => 'BEBIDAS',
		]);
    }
}
