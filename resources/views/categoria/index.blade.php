@extends('adminlte::page')

@section('title', 'CATEGORIA (SOMOS +)')

@section('content_header')

    <h1>Categoria</h1>
@stop

@section('content')

<!-- <div class="shadow-lg p-3 mb-5 bg-white rounded"><h3>Contenido de INDEX</h3></div> -->
<a href="{{ URL::to('categoria/create') }}" class="btn btn-primary">CRIAR</a>

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
      <th scope="col"></th>
      <th scope="col"></th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>    
    @foreach ($categorias as $key => $value)

    <tr>
            <td>{{ $value-> id }}</td>
            <td>{{ $value-> nome }}</td>
        
        <td>
            <a href="{{ URL::to('categoria/' . $value->id . '/edit') }}" class="btn btn-info">Editar</a>
        </td>
        <td>
            {{ Form::open(array('url' => 'categoria/' . $value->id, 'onsubmit' => 'return ConfirmDelete()'))}}
            {{ Form::hidden('_method', 'DELETE') }}
            {{ Form::submit('Excluir', array('class' => 'btn btn-danger'))}}
            {{ Form::close() }}
        </td>       
    </tr>
    @endforeach
  </tbody>
</table>


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop

