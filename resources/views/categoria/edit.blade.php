
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>EDITAR CATEGORIA</h1>
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


    <form action="{{ route('categoria.update', $categoria->id) }}" method="post" enctype="multipart/form">
        @csrf    
        @method('PUT')
    <div class="mb-3">
        <label for="" class="form-label">Nome</label>
        <input id="nome" name="nome" type="text" class="form-control" value="{{$categoria->nome}}">    
    </div>
  
        <a href="{{ URL::to('categoria/') }}" class="btn btn-secondary">Voltar</a>
        <button type="submit" class="btn btn-primary">Gravar</button>
    </form>

    
    @stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop

