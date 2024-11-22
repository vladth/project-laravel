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
        //$this->call(UsersTableSeeder::class);
        DB::table('users')->insert([
        	'id' => 1,
        	'nombre' => 'Admin',
        	'tipo_documento' => 'CEDULA',
        	'num_documento' => '4555555',
        	'direccion'=> 'los andes',
        	'telefono' => '77778455',
        	'email' => 'admin@gmail.com',
        	'usuario' => 'admin',
            'password' => bcrypt('12345678'),
            'condicion'=> 1,
            'idrol'=> 1,
            'imagen' => '1592708579.jpeg',
        ]);
    }
}
