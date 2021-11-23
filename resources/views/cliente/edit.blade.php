@extends('adminlte::page')

@section('title', 'Cliente')

@section('content_header')
    <h1>EDITAR CLIENTE</h1>
    @stop

    @section('content')
    
    
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif


    <form action="{{ route('cliente.update', $cliente->id) }}" method="post" enctype="multipart/form">
        @csrf    
        @method('PUT')
    <div class="mb-3">
        <label for="" class="form-label">Nome</label>
        <input id="nome" name="nome" type="text" class="form-control" value="{{$cliente->nome}}">    
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Documento</label>
        <input id="documento" name="documento" type="text" class="form-control" value="{{$cliente->documento}}">    
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Endereço</label>
        <input id="endereco" name="endereco" type="text" class="form-control" value="{{$cliente->endereco}}">    
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Telefone</label>
        <input id="telefone" name="telefone" type="number" class="form-control" value="{{$cliente->telefone}}">    
    </div>
    <div class="mb-3">
        <label for="" class="form-label">E-mail</label>
        <input id="email" name="email" type="text" class="form-control" value="{{$cliente->email}}">    
    </div>

        <a href="{{ URL::to('cliente/') }}" class="btn btn-secondary">Voltar</a>
        <button type="submit" class="btn btn-primary">Gravar</button>
    </form>

    

    @stop

        @section('css')
            <link rel="stylesheet" href="/css/admin_custom.css">
        @stop
            
        @section('js')
            <script> console.log('Hi!'); </script>
        @stop

