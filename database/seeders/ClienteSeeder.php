<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cliente;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cliente::create([
            'nome' => 'Augusto Guilherme',
            'documento' => '9898989989',
            'endereco' => 'Rua Acre, Rio de janeiro',
            'telefone' => '98989898',
            'email' => 'email@email.com'
        ]);

        Cliente::create([
            'nome' => 'Andre Neves',
            'documento' => '9898989989',
            'endereco' => 'Rua Acre, Rio de janeiro',
            'telefone' => '98989898',
            'email' => 'email@email.com'
        ]);


        Cliente::create([
            'nome' => 'JOão Lino',
            'documento' => '9898989989',
            'endereco' => 'Rua Acre, Rio de janeiro',
            'telefone' => '98989898',
            'email' => 'email@email.com'
        ]);


    }
}