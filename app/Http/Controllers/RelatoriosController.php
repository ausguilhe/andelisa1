<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\cliente;
use App\Models\Venda;

class RelatoriosController extends Controller
{

    public function index(Request $request){   //listrar as vendas e seus relacionamtos

       //nome-data-preço
        $relatorios = Venda::join('produtos', 'vendas.id_cliente', '=', 'produtos.id')
        ->select('produtos.nome as produto_id','vendas.created_at', 'produtos.preco')
        ->get();

        $total = 0;
        foreach($relatorios as $item) {
            $total += $item->preco;
        }
        
        return view('relatorios.index', compact('relatorios', 'total'));
 
    }
    
}
