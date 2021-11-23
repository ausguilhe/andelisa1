@extends('adminlte::page')

@section('title', 'Usuário')

@section('content_header')

    <h1>CRIAR USUÁRIO</h1>

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

    {{ Form::open(array('url' => '/user/create')) }}

    {{ Form::label('nome', 'Nome') }}
    {{ Form::text('nome', null) }}
    <br/>
    {{ Form::label('email', 'E-mail') }}
    {{ Form::text('email', null) }}
    <br/>
    {{ Form::label('password', 'Senha') }}
    {{ Form::password('password', null) }}
    <br/>
    {{ Form::label('password', 'Confirme senha') }}
    {{ Form::password('password', null) }}
    <br/>
    {{ Form::submit('Enviar') }}

    {{ Form::close() }}

    @stop

    @section('css')
        <link rel="stylesheet" href="/css/admin_custom.css">
    @stop
        
    @section('js')
        <script> console.log('Hi!'); </script>
    @stop
