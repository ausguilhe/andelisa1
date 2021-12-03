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

<form action="{{ route('user.create') }}" method="post" enctype="multipart/form">
    @csrf
<div class="mb-3">
    <label for="" class="form-label">Nome</label>
    <input id="name" name="name" type="text" class="form-control" tabindex="1">    
</div>
<div class="mb-3">
    <label for="" class="form-label">E-mail</label>
<input id="email" name="email" type="text" class="form-control" tabindex="1">    
</div>
<div class="mb-3">
    <label for="" class="form-label">Senha</label>
<input id="password" name="password" type="password" class="form-control" tabindex="1">    
</div>
<div class="mb-3">
    <label for="" class="form-label">Confirmar senha</label>
<input id="password" name="password" type="password" class="form-control" tabindex="1">    
</div>

<a href="{{ URL::to('user/') }}" class="btn btn-secondary">Voltar</a>
<button type="submit" class="btn btn-primary">Gravar</button>
</form>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
        
@section('js')
    <script> console.log('Hi!'); </script>
@stop
    