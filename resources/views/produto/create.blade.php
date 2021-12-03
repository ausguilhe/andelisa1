@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

    <h1>CRIAR PRODUTO</h1>
    
@stop

@section('content')

    
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif
    
    @if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif
    
    @if ($errors->any())
    <div class="alert alert-danger">
    <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
    </ul>
    </div>
    @endif
    
    @section('content')

    <form action="{{ route('produto.create') }}" method="post" enctype="multipart/form">
      @csrf
      {{ Form::label('categoria', 'Categoria') }}
      {{ Form::select('categoria_id', $categorias) }}
      <br/>
  
<div class="mb-3">
    <label for="" class="form-label">Códigos barra</label>
    <input id="codigo_barras" name="codigo_barras" type="number" class="form-control" tabindex="1">    
</div>
  <div class="mb-3">
      <label for="" class="form-label">Nome</label>
  <input id="nome" name="nome" type="text" class="form-control" tabindex="1">    
  </div>
  <div class="mb-3">
      <label for="" class="form-label">Descrição</label>
  <input id="descricao" name="descricao" type="text" class="form-control" tabindex="1">    
  </div>
  <div class="mb-3">
      <label for="" class="form-label">Preço</label>
  <input id="preco" name="preco" type="number" class="form-control" tabindex="1">    
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Estoque</label>
<input id="estoque" name="estoque" type="number" class="form-control" tabindex="1">    
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
