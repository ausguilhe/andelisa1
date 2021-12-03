@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

    <h1>EDITAR PRODUTO</h1>
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

<form action="{{ route('produto.update', $produto->id) }}" method="post" enctype="multipart/form">
    @csrf    
    @method('PUT')
<div class="mb-3">
    {{ Form::label('categoria', 'Categoria') }}
    {{ Form::select('categoria_id', $categorias) }}
    <br/>
</div>
<div class="mb-3">
    <label for="" class="form-label">Código barras</label>
    <input id="codigo_barras" name="codigo_barras" type="number" class="form-control" value="{{$produto->codigo_barras}}">    
</div>
<div class="mb-3">
    <label for="" class="form-label">Nome</label>
    <input id="nome" name="nome" type="text" class="form-control" value="{{$produto->nome}}">    
</div>
<div class="mb-3">
    <label for="" class="form-label">Descrição</label>
    <input id="descricao" name="descricao" type="text" class="form-control" value="{{$produto->descricao}}">    
</div>
<div class="mb-3">
    <label for="" class="form-label">Preço</label>
    <input id="preco" name="preco" type="number" class="form-control" value="{{$produto->preco}}">    
</div>
<div class="mb-3">
    <label for="" class="form-label">Estoque</label>
    <input id="estoque" name="estoque" type="number" class="form-control" value="{{$produto->estoque}}">    
</div>

    <a href="{{ URL::to('produto/') }}" class="btn btn-secondary">Voltar</a>
    <button type="submit" class="btn btn-primary">Gravar</button>
</form>


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
            
@section('js')
    <script> console.log('Hi!'); </script>
@stop

