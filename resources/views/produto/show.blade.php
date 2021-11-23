@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

    <h2>Descrição do Produto</h2>
    
    @stop

    @section('content')

    <p>ID:                          {{ $produto->id}}</p>
    <p>Categoria:                   {{ $produto->categoria->nome}}</p>
    <p>Nome:                        {{ $produto->nome}}</p>
    <p>Descrição:                   {{ $produto->descricao}}</p>
    <p>Preço:                       {{ $produto->preco}}</p>
    <p>Criação                      {{ Carbon\Carbon::parse($produto->create_at)->format('d/m/y H:i') }}</p>
    <p>Última modificação:          {{ Carbon\Carbon::parse($produto->update_at)->format('d/m/y H:i')}}</p>
    
    @stop

    @section('css')
        <link rel="stylesheet" href="/css/admin_custom.css">
    @stop
    
    @section('js')
        <script> console.log('Hi!'); </script>
    @stop