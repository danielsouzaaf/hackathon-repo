<?php

use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('statuses')->insert([
            ['descricao' => 'Aguardando recolhimento municipal'],
            ['descricao' => 'Em negociação'],
            ['descricao' => 'Mandar ao aterro'],
            ['descricao' => 'Mandar para reciclagem'],
            ['descricao' => 'Concluido'],
        ]);
    }
}
