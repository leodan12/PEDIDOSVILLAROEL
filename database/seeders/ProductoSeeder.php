<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('producto')->insert([
            'nombre' => 'Papa Yungay', 
            'preciomayor' => 20.2, 
        ]);

        DB::table('producto')->insert([
            'nombre' => 'Papa Yungay 02', 
            'preciomayor' => 20.2, 
        ]);

        DB::table('producto')->insert([
            'nombre' => 'Papa Yungay 03', 
            'preciomayor' => 20.2, 
        ]);
    }
}
