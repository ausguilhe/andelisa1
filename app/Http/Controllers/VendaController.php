<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Venda;
use Illuminate\Http\Request;

class VendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vendas = Venda::get();
        return view('venda.index', compact('vendas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vendas = Venda::get();
        return view('venda.create', compact('vendas'));
    }
    public function store(StoreRequest $request)
    {
        $venda = Venda::create($request->all());

        foreach ($request->produto_id as $key=> $produto) {
            $results[] = array("produto_id"=>$request->produto_id[$key],
            "quatidade"=>$request->quantidade[$key], "preco"=>$request->preco[$key], 
            "desconto"=>$request->desconto[$key]);
        }
        $venda->shoppingDetalhes()->createMany($results);
        return redirect()->route('venda.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(Venda $venda)
    {
        return view('venda.show', compact('venda'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Venda $venda)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
