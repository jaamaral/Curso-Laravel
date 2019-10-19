<?php

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
        $this->truncateTabelas([
            'role',
            'permissao',
        ]);
        $this->call(TabelaRoleSeeder::class);
        $this->call(TabelaPermissaoSeeder::class);
    }

    protected function truncateTabelas(array $tabelas){
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        foreach($tabelas as $tabela){
            DB::table($tabela)->truncate();
        }
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
    }
}
