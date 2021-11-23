
@extends('adminlte::page')

@section('title', 'Somos "+" - Cliente')

@section('content_header')
    <h1>CLIENTES</h1>
@stop

@section('content')



    <!-- botao criar -->
    <a href="{{ URL::to('cliente/create') }}" class="btn btn-primary">CRIAR</a>
   
    
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
        <th scope="col">nome</th>
        <th scope="col">Documento</th>
        <th scope="col">Endereço</th>
        <th scope="col">Telefone</th>
        <th scope="col">E-mail</th>
      </tr>
    </thead>
        <tbody>

            @foreach ($clientes as $key => $value)

                <tr>
                    <td>{{ $value->id }}</td>
                    <td>{{ $value->nome }}</td>
                    <td>{{ $value->documento }}</td>
                    <td>{{ $value->endereco }}</td>
                    <td>{{ $value->telefone }}</td>
                    <td>{{ $value->email }}</td>
                    <td>
                        <a href="{{ URL::to('cliente/' . $value->id) }}" class="btn btn-info">Visualizar</a>
                    </td>
                    <td>
                        <a href="{{ URL::to('cliente/' . $value->id.'/edit') }}" class="btn btn-warning">Editar</a>
                    </td>
                    <td>
                        {{ Form::open(array('url' => 'cliente/' . $value->id, 'onsubmit' => 'return ConfirmDelete()'))}}
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
                   
