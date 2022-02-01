<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DetalleOrdenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('detalleordens')->insert([
            'idordencompra' => '1', 
            'idproducto' => '1', 
            'descripcion' => 'COMPRA DE CLIENTE 01', 
            'cantidad' => 5, 
            'unidad' => 'sacos', 
        ]);

        DB::table('detalleordens')->insert([
            'idordencompra' => '2', 
            'idproducto' => '2', 
            'descripcion' => 'COMPRA DE CLIENTE 02', 
            'cantidad' => 3, 
            'unidad' => 'sacos', 
        ]);
    }
}
