<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categoria::create([
            'nome' => 'Camisa'
        ]);

        Categoria::create([
            'nome' => 'Sapato'
        ]);

        Categoria::create([
            'nome' => 'Short'
        ]);


    }
}
