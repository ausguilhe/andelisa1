@extends('adminlte::page')

@section('title', 'Cliente')

@section('content_header')

    <h2>Descrição do Cliente</h2>
    
    @stop

    @section('content')

    <p>ID:                          {{ $cliente->id}}</p>
    <p>Nome:                        {{ $cliente->nome}}</p>
    <p>Documento:                   {{ $cliente->documento}}</p>
    <p>Endereço:                    {{ $cliente->endereco}}</p>
    <p>Telefone:                    {{ $cliente->telefone}}</p>
    <p>Email:                       {{ $cliente->email}}</p>
    <p>Criação                      {{ Carbon\Carbon::parse($cliente->create_at)->format('d/m/y H:i') }}</p>
    <p>Última modificação:          {{ Carbon\Carbon::parse($cliente->update_at)->format('d/m/y H:i')}}</p>
    
    @stop

    @section('css')
        <link rel="stylesheet" href="/css/admin_custom.css">
    @stop
    
    @section('js')
        <script> console.log('Hi!'); </script>
    @stop