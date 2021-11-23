<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // listar todos os produtos
        $produtos = Produto::orderBy('nome', 'ASC')->get();
        //dd($produtos);
        return view('produto.index', ['produtos' => $produtos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias=Categoria::pluck('nome', 'id');        
        return view('produto.create', compact ('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$data = $request->all();
        //dd($data);

        $message = [
            'nome.required' => 'O campo nome é obrigatório',
            'nome.mim' => 'O campo nome precisa ter no mínimo :mim caracteres',
            'descricao.required' => 'O campo descrição é obrigatório',
            'categoria_id.required' => 'O campo categoria é obrigatório',
            'preco.required' => 'O campo preço é obrigatório',
        ];

        $validateData = $request->validate([
            'nome'         => 'required|min:2',
            'descricao'    => 'required',
            'categoria_id' => 'required',
            'preco'        => 'required',
        ], $message);

        $produto = new Produto;
        $produto->nome          =$request->nome;
        $produto->descricao     =$request->descricao;
        $produto->categoria_id  =$request->categoria_id;
        $produto->preco         =$request->preco;
        $produto->save();

        return redirect()->route('produto.index')->with('message', 'Produto criado com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produto $produto
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produto = Produto::findOrFail($id);
        return view('produto.show', ['produto' => $produto]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produto $produto
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //dd("EDITAR o registro {$id});
        $categorias= Categoria::pluck('nome', 'id');
        $produto = Produto::findOrFail($id);
        return view('produto.edit', ['produto' => $produto, 'categorias'=> $categorias]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produto $produto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $message = [
            'nome.required' => 'O campo nome é obrigatório',
            'nome.mim' => 'O campo nome precisa ter no mínimo :mim caracteres',
            'descricao.required' => 'O campo descrição é obrigatório',
            'preco.required' => 'O campo preço é obrigatório',
        ];

        $validateData = $request->validate([
            'nome'      => 'required|min:2',
            'descricao'  => 'required',
            'preco' => 'required',
        ], $message);

        $produto = Produto::findOrFail($id);
        $produto->nome       =$request->nome;
        $produto->descricao  =$request->descricao;
        $produto->preco      =$request->preco;
        $produto->save();

        return redirect()->route('produto.index')->with('message', 'Produto editado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * 
     * @param  \App\Models\Produto $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produto = Produto::findOrFail($id);
        $produto->delete();
        return redirect()->route('produto.index')->with('message', 'Produto excluido com sucesso!');
    }
}