<?php

namespace Database\Seeders;

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
        // \App\Models\User::factory(10)->create();

        
        $this->call(PerfilsSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(ClienteSeeder::class);
        $this->call(ProductoSeeder::class);
        $this->call(OrdenSeeder::class);
        $this->call(DetalleOrdenSeeder::class);
        $this->call(PersonalSeeder::class);
        $this->call(AsistenciaSeeder::class);
       
       
       
       
       
       
    }
}
