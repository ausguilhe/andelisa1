@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h2>Descrição da Categoria</h2>
    
    @stop

    @section('content')

    

    <p>ID:                          {{ $categoria->id}}</p>
    <p>Nome:                        {{ $categoria->nome}}</p>
    <p>Descrição:                   {{ $categoria->descricao}}</p>
    <p>Criação                      {{ Carbon\Carbon::parse($categoria->create_at)->format('d/m/y H:i') }}</p>
    <p>Última modificação:          {{ Carbon\Carbon::parse($categoria->update_at)->format('d/m/y H:i')}}</p>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
