<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class TabelaRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            'administrador',
            'editor',
            'supervisor'
        ];
        foreach($roles as $key => $value){
            DB::table('role')->insert([
                'nome' => $value,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
        }
    }
}
