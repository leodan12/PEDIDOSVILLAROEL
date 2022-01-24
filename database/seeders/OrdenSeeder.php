<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class OrdenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ordencompra')->insert([
            'estadoOrden' => 'NO LISTAR', 
            'fechaorden' => '2022-01-15', 
            'lugar' => 'El Porvenir', 
            'idcliente' => '1', 
        ]);

        DB::table('ordencompra')->insert([
            'estadoOrden' => 'PARA LISTAR', 
            'fechaorden' => '2022-01-24', 
            'lugar' => 'El Porvenir', 
            'idcliente' => '2', 
        ]);

       
    }
}
