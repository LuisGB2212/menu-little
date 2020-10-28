<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('type_orders')->insert([
			'name' => 'ENVIO A DOMICILIO',
        ]);

        DB::table('type_orders')->insert([
			'name' => 'RECOLECCIÓN EN SUCURSAL',
        ]);
    }
}
