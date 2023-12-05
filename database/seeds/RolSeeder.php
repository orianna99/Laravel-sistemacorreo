<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rols')->insert([
            'key' => 'admin',
            'description'=>'Rol de Administrador'
        ]);
        DB::table('rols')->insert([
            'key' => 'master',
            'description'=>'Rol de usuario master'
        ]);
        DB::table('rols')->insert([
            'key' => 'regular',
            'description'=>'Rol de usuario regular'
        ]);
    }
}
