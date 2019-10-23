<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsuarioAdministradorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usuario')->insert([
            'usuario' => 'admin',
            'nome' => 'Administrador',
            'password' => bcrypt('1234'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('usuario')->insert([
            'usuario' => 'ze',
            'nome' => 'José',
            'password' => bcrypt('1234'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('usuario_role')->insert([
            'role_id' => 1,
            'usuario_id' => 1,
            'estado' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('usuario_role')->insert([
            'role_id' => 2,
            'usuario_id' => 2,
            'estado' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
