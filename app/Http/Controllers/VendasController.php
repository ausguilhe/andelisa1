<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Cliente;
use App\Models\Venda;
use Illuminate\Http\Request;


class VendasController extends Controller
{
    public function index(Request $request){
        $vendas = Venda::join('produtos', 'vendas.produto_id', '=', 'produtos.id')
            ->join('clientes', 'vendas.cliente_id', '=', 'clientes.id')
            ->select('produtos.nome as nome_produto','clientes.nome as nome_cliente','vendas.data_criacao', 'produtos.preco', 'vendas.numero_vendas')
            ->get();    

        $mensagem = $request->session()->get('mensagem');  // msg de produto criado

        return view('vendas.index', compact('vendas', 'mensagem'));


    }

    public function create( )
    {

        $produtos = Produto::query()
            ->orderBy('nome')
            ->get();
        $clientes = Cliente::query()
            ->orderBy('nome')
            ->get();

        return view('vendas.create',  compact('produtos', 'clientes'));
    }

    public function store(Request $request)
    {

        Venda::create($request->all());


        $request->session()
            ->flash(
                'mensagem',
                "Venda  salva com sucesso."
            );

        return redirect()->route( 'vendas.store'); //nome da rota

    }
}
