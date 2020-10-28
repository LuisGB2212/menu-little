<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DrinkFoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('drink_food')->insert([
			'name' => 'GUACAMOLE',
			'description' => 'TOTOPOS, AGUACATE, TOMATE, SAL Y CEBOLLA.',
			'price' => 80,
			'category_id' => 1,
			'type_id' => 1,
		]);
		DB::table('drink_food')->insert([
			'name' => 'ANCHOAS',
			'description' => 'ANCHOAS, PAN TOSTADO, QUESO PARMESANO Y GERMINADO.',
			'price' => 140,
			'category_id' => 1,
			'type_id' => 1,
		]);
		DB::table('drink_food')->insert([
			'name' => 'SOPA DE LIMA',
			'description' => 'Lima, totopos, sal y especies.',
			'price' => 90,
			'category_id' => 2,
			'type_id' => 1,
		]);
		DB::table('drink_food')->insert([
			'name' => 'POC-CHUC',
			'description' => 'CARDE DE CERDO, SAL, JUGO DE NARANJA,PIMIENTA, CEBOLLA, CILANTRO, ACEITE Y TOMATE.',
			'price' => 80,
			'category_id' => 2,
			'type_id' => 1,
		]);
		DB::table('drink_food')->insert([
			'name' => 'FLAN',
			'description' => 'POLVO DE FLAN, LECHE EVAPORADA Y CONDENSDDA, VAINILLA Y AZUCAR',
			'price' => 30,
			'category_id' => 3,
			'type_id' => 1,
		]);
		DB::table('drink_food')->insert([
			'name' => 'HELADO DE FRESA',
			'description' => 'FRESA, YOGOURTH Y HIELO',
			'price' => 30,
			'category_id' => 3,
			'type_id' => 1,
		]);
		DB::table('drink_food')->insert([
			'name' => 'JUGO DE SANDIA',
			'description' => 'SANDIA, HIELO, AGUA Y AZUCAR',
			'price' => 25,
			'category_id' => 4,
			'type_id' => 2,
		]);
		DB::table('drink_food')->insert([
			'name' => 'JUGO NARANJA',
			'description' => 'NARANJA, AGUA, HIELO Y AZUCAR',
			'price' => 25,
			'category_id' => 4,
			'type_id' => 2,
		]);
		DB::table('drink_food')->insert([
			'name' => 'COCA',
			'description' => 'COCA',
			'price' => 20,
			'category_id' => 5,
			'type_id' => 2,
		]);
		DB::table('drink_food')->insert([
			'name' => 'PEPSI',
			'description' => 'PEPSI',
			'price' => 20,
			'category_id' => 5,
			'type_id' => 2,
		]);
		DB::table('drink_food')->insert([
			'name' => 'CAIPIRIÑA',
			'description' => 'LIMON, RON, AZUCAR, MENTA Y HIELO.',
			'price' => 80,
			'category_id' => 6,
			'type_id' => 2,
		]);
		DB::table('drink_food')->insert([
			'name' => 'MARGARITA',
			'description' => 'TEQUILA, LICOR DE NARANJA, LIMON, SAL Y HIELO.',
			'price' => 80,
			'category_id' => 6,
			'type_id' => 2,
		]);
		DB::table('drink_food')->insert([
			'name' => 'BUD LIGHT',
			'description' => 'CERVEZA',
			'price' => 40,
			'category_id' => 7,
			'type_id' => 2,
		]);
		DB::table('drink_food')->insert([
			'name' => 'XX LAGER',
			'description' => 'CERVEZA',
			'price' => 40,
			'category_id' => 7,
			'type_id' => 2,
		]);
		DB::table('drink_food')->insert([
			'name' => 'COPA DE VODKA',
			'description' => 'ALCOHOL',
			'price' => 90,
			'category_id' => 8,
			'type_id' => 2,
		]);
		DB::table('drink_food')->insert([
			'name' => 'COPA DE WISKY',
			'description' => 'ALCOHOL',
			'price' => 90,
			'category_id' => 8,
			'type_id' => 2,
		]);
    }
}
