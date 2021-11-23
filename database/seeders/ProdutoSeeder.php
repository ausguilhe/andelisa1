<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Produto;

class ProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Produto::create([
            'nome' => 'Camisa de gola polo',
            'descricao' => 'Camisa',
            'categoria_id' => 1,
            'preco' => 45
        ]);

        Produto::create([
            'nome' => 'Sapato preto 42',
            'descricao' => 'Sapato',
            'categoria_id'=> 2,
            'preco' => 75
        ]);

        Produto::create([
            'nome' => 'Short azul',
            'descricao' => 'Short',
            'categoria_id' => 3,
            'preco' => 40
        ]);


    }
}
