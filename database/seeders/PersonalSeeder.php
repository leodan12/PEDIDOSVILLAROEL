<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class PersonalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('personal')->insert([
            'nombres' => 'Marcos', 
            'apellidos' => 'Villarroel', 
            'email' => 'Marcos@gmail.com', 
            'telefono' => '984528488', 
            'direccion' => 'Av. Juan Pablo', 
            'sexo' => 'MASCULINO', 
            'idUsuario' => '3', 
        ]);

        DB::table('personal')->insert([
            'nombres' => 'Luchito', 
            'apellidos' => 'Villarroel', 
            'email' => 'luchito@gmail.com', 
            'telefono' => '984528488', 
            'direccion' => 'Av. Juan Pablo', 
            'sexo' => 'MASCULINO', 
            'idUsuario' => '4', 
        ]);
    }
}
