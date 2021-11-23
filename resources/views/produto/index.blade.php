
@extends('adminlte::page')

@section('title', 'Somos "+" - Produto')

@section('content_header')
    <h1>PRODUTOS</h1>
@stop

@section('content')


    <!-- botao criar -->
    <a href="{{ URL::to('produto/create') }}" class= "btn btn-primary">CRIAR</a>
    
    
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    <script>
        function ConfirmDelete() {
            return confirm('Tem certeza que deseja excluir esse registro?');
        }
    </script>

<table class="table table-dark table-striped mt-4">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Categoria</th>
        <th scope="col">Nome</th>
        <th scope="col">Descrição</th>
        <th scope="col">Preço</th>
        <th scope="col">Estoque</th>
        
       
      </tr>
    </thead>
        <tbody>

            @foreach ($produtos as $key => $value)

                <tr>
                    <td>{{ $value->id }}</td>
                    <td>{{ $value->categoria->nome }}</td>
                    <td>{{ $value->nome }}</td>
                    <td>{{ $value->descricao }}</td>
                    <td>{{ $value->preco }}</td>
                    <td>{{ $value->estoque }}</td>
                    
                    <td>
                        <a href="{{ URL::to('produto/' . $value->id) }}" class="btn btn-info">Visualizar</a>
                    </td>
                    <td>
                        <a href="{{ URL::to('produto/' . $value->id.'/edit') }}" class="btn btn-warning">Editar</a>
                    </td>
                    <td>
                        {{ Form::open(array('url' => 'produto/' . $value->id, 'onsubmit' => 'return ConfirmDelete()'))}}
                        {{ Form::hidden('_method', 'DELETE') }}
                        {{ Form::submit('Excluir', array('class' => 'btn btn-danger'))}}
                        {{ Form::close() }}
                    </td>

                </tr>
                    
                
            @endforeach
                
        @stop

        @section('css')
            <link rel="stylesheet" href="/css/admin_custom.css">
        @stop
            
        @section('js')
            <script> console.log('Hi!'); </script>
        @stop
                   
