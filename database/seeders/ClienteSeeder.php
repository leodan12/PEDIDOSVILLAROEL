<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cliente')->insert([
            'razonsocial' => 'cliente01', 
            'ruc' => '12345678914', 
            'direccion' => 'El Porvenir', 
        ]);

        DB::table('cliente')->insert([
            'razonsocial' => 'cliente02', 
            'ruc' => '12345678914', 
            'direccion' => 'El Porvenir', 
        ]);
        
        DB::table('cliente')->insert([
            'razonsocial' => 'cliente03', 
            'ruc' => '12345678914', 
            'direccion' => 'El Porvenir', 
        ]);

    }
}
