<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// use bd
use Illuminate\Support\Facades\DB;

class carteraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('carteras')->insert([
            'nombre' => 'Cartera 1',
            'titulo' => 'Titulo 1',
        ]);
    }
}
