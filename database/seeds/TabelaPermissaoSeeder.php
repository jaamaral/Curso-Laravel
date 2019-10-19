<?php

use App\Models\Permissao;
use Illuminate\Database\Seeder;

class TabelaPermissaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Permissao::class)->times(50)->create();
    }
}
