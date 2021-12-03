@extends('adminlte::page')

@section('title', 'Usuário')

@section('content_header')

    <h2>Descrição do usuário</h2>
    
    @stop

    @section('content')

    <p>ID:                          {{ $user->id}}</p>
    <p>Nome:                        {{ $user->name}}</p>
    <p>E-mail:                      {{ $user->documento}}</p>
    <p>Password:                    {{ $user->endereco}}</p>
    <p>Criação                      {{ Carbon\Carbon::parse($user->create_at)->format('d/m/y H:i') }}</p>
    <p>Última modificação:          {{ Carbon\Carbon::parse($user->update_at)->format('d/m/y H:i')}}</p>
    
    @stop

    @section('css')
        <link rel="stylesheet" href="/css/admin_custom.css">
    @stop
    
    @section('js')
        <script> console.log('Hi!'); </script>
    @stop