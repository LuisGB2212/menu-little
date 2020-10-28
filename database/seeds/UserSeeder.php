<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => 1,
			'name' => 'Administrador',
            'email' => 'admin@admin.com',
            'password' => Hash::make('123456789'),
            'type_user_id' => 1
		]);
    }
}
