<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(['name' => 'administrador','email' => 'administrador@gmail.com', 'password' =>bcrypt('password') ,'perfils_id' => '1','is_admin' => TRUE,]);
        DB::table('users')->insert(['name' => 'gerente','email' => 'gerente@gmail.com', 'password' =>bcrypt('password') ,'perfils_id' => '2','is_admin' => FALSE,]);
          //usuarios de egresados
    }
}
