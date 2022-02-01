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
        DB::table('producto')->insert([ 'nombre' => 'Papa Yungay',  'preciomayor' => 20.2,    ]);

        DB::table('producto')->insert([  'nombre' => 'Papa amarilla',  'preciomayor' => 30.0,   ]);

        DB::table('producto')->insert([  'nombre' => 'Papa Huayro',    'preciomayor' => 18.2,  ]);
        DB::table('producto')->insert([  'nombre' => 'Papa blanca',  'preciomayor' => 22.2,   ]);

        DB::table('producto')->insert([  'nombre' => 'Papa peruana',    'preciomayor' => 25.2,  ]);
    }
}
