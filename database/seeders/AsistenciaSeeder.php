<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class AsistenciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('asistencias')->insert([
            'fecha' => '2022-01-24', 
            'estadoAsistencia' => 'PRESENTE', 
            'idpersonal' => '1', 
        ]);

        DB::table('asistencias')->insert([
            'fecha' => '2022-01-15', 
            'estadoAsistencia' => 'AUSENTE', 
            'idpersonal' => '1', 
        ]);

        DB::table('asistencias')->insert([
            'fecha' => '2022-01-24', 
            'estadoAsistencia' => 'AUSENTE', 
            'idpersonal' => '2', 
        ]);
    }
}
