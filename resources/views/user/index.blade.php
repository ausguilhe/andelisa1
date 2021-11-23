
@extends('adminlte::page')

@section('title', 'Somos "+" Usuários')

@section('content_header')
    <h1>USUÁRIOS</h1>
@stop

@section('content')



    <!-- botao criar -->
    <a href="{{ URL::to('user/create') }}"><h2>Criar</h2></a>



    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    <script>
        function ConfirmDelete() {
            return confirm('Tem certeza que deseja excluir esse registro?');
        }
    </script>

    <table class= "table no-margin">
        <thead>
            <tr>
                <th>id</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>

            @foreach ($users as $key => $value)

                <tr>
                    <td>{{ $value->id }}</td>
                    <td>{{ $value->nome }}</td>
                    <td>{{ $value->email }}</td>
                    <td>
                        <a href="{{ URL::to('user/' . $value->id) }}">Visualizar</a>
                    </td>
                    <td>
                        <a href="{{ URL::to('user/' . $value->id.'/edit') }}">Editar</a>
                    </td>
                    <td>
                        {{ Form::open(array('url' => 'user/' . $value->id, 'onsubmit' => 'return ConfirmDelete()'))}}
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
                   
