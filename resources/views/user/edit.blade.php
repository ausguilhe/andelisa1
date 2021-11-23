@extends('adminlte::page')

@section('title', 'Usuário')

@section('content_header')
    <h1>EDITAR USUÁRIO</h1>
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


    {{ Form::model($user, array('route' => array('user.update', $user->id), 'method' => 'put')) }}

    {{ Form::label('nome', 'Nome') }}
    {{ Form::text('nome', $user->nome) }}
    <br/>
    {{ Form::label('email', 'E-mail') }}
    {{ Form::text('email', $user->email) }}
    <br/>
    {{ Form::label('password', 'Senha') }}
    {{ Form::password('password', null) }}
    <br/>
    {{ Form::label('password', 'Confirme senha') }}
    {{ Form::password('password', null) }}
    <br/>
    {{ Form::submit('Enviar', ['class' => 'btn btn-outline-success' ]) }}

    {{ Form::close() }}

    @stop

        @section('css')
            <link rel="stylesheet" href="/css/admin_custom.css">
        @stop
            
        @section('js')
            <script> console.log('Hi!'); </script>
        @stop

