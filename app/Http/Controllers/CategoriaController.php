<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // listar todos os produtos
        $categorias = Categoria::orderBy('nome', 'ASC')->get();
        //dd($produtos);
        return view('categoria.index', ['categorias' => $categorias]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categoria.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $data = $request->all();
        // dd($data);

        $message = [
            'nome.required' => 'O campo nome é obrigatório',
            'nome.mim' => 'O campo nome precisa ter no mínimo :mim caracteres',
        ];

        $validateData = $request->validate([
            'nome'      => 'required|min:2',
        ], $message);

        $categoria = new Categoria;
        $categoria->nome = $request->nome;
        $categoria->save();

        return redirect()->route('categoria.index')->with('message', 'Categoria criado com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categoria $produto
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categoria = Categoria::findOrFail($id);
        return view('categoria.show', ['categoria' => $categoria]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categoria $produto
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //dd("EDITAR o registro {$id});
        $categoria = Categoria::findOrFail($id);
        return view('categoria.edit', ['categoria' => $categoria]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categoria $produto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $message = [
            'nome.required' => 'O campo nome é obrigatório',
            'nome.mim' => 'O campo nome precisa ter no mínimo :mim caracteres',
        ];

        $validateData = $request->validate([
            'nome'      => 'required|min:2',
        ], $message);

        $categoria = Categoria::findOrFail($id);
        $categoria->nome       =$request->nome;
        $categoria->save();

        return redirect()->route('categoria.index')->with('message', 'Categoria editado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * 
     * @param  \App\Models\Categoria $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categoria = Categoria::findOrFail($id);
        $categoria->delete();
        return redirect()->route('categoria.index')->with('message', 'Categoria excluido com sucesso!');
    }
}
