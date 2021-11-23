<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // listar todos os clientes
        $clientes = Cliente::orderBy('nome', 'ASC')->get();
        //dd($clientes);
        return view('cliente.index', ['clientes' => $clientes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
              
        return view('cliente.create');
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
            'documento.required' => 'O campo documento é obrigatório',
            'endereco.required' => 'O campo endereço é obrigatório',
            'telefone.required' => 'O campo telefone é obrigatório',
            'email.required' => 'O campo email é obrigatório',
        ];

        $validateData = $request->validate([
            'nome'         => 'required|min:2',
            'documento'    => 'required',
            'endereco'     => 'required',
            'telefone'     => 'required',
            'email'        => 'required',
        ], $message);

        $cliente = new Cliente;
        $cliente->nome          =$request->nome;
        $cliente->documento     =$request->documento;
        $cliente->endereco      =$request->endereco;
        $cliente->telefone      =$request->telefone;
        $cliente->email         =$request->email;
        $cliente->save();

        return redirect()->route('cliente.index')->with('message', 'Cliente criado com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cliente $cliente
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cliente = Cliente::findOrFail($id);
        return view('cliente.show', ['cliente' => $cliente]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cliente $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //dd("EDITAR o registro {$id});
        $cliente = Cliente::findOrFail($id);
        return view('cliente.edit', ['cliente' => $cliente]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cliente $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $message = [
            'nome.required' => 'O campo nome é obrigatório',
            'nome.mim' => 'O campo nome precisa ter no mínimo :mim caracteres',
            'documento.required' => 'O campo documento é obrigatório',
            'endereco.required' => 'O campo endereço é obrigatório',
            'telefone.required' => 'O campo telefone é obrigatório',
            'email.required' => 'O campo email é obrigatório',
        ];

        $validateData = $request->validate([
            'nome'         => 'required|min:2',
            'documento'    => 'required',
            'endereco'     => 'required',
            'telefone'     => 'required',
            'email'        => 'required',
        ], $message);

        $cliente = Cliente::findOrFail($id);
        $cliente->nome          =$request->nome;
        $cliente->documento     =$request->documento;
        $cliente->endereco      =$request->endereco;
        $cliente->telefone      =$request->telefone;
        $cliente->email         =$request->email;
        $cliente->save();

        return redirect()->route('cliente.index')->with('message', 'Cliente editado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * 
     * @param  \App\Models\Cliente $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->delete();
        return redirect()->route('cliente.index')->with('message', 'Cliente excluido com sucesso!');
    }
}