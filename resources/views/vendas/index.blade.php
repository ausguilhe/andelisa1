@extends('adminlte::page')

@section('title', 'Somos "+" - Vendas')

@section('content_header')

    <div class="row">
        <div class="col-12">
            <h1>Vendas <i class="fa fa-list"></i></h1>
@stop

@section('content')

@if (Session::has('message'))
<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<script>
function ConfirmDelete() {
    return confirm('Tem certeza que deseja excluir esse registro?');
}
</script>

           
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Cliente</th>
                        <th>Total</th>
                        <th>Ticket de venda</th>
                        <th>Detalhes</th>
                        <th>Eliminar</th>                        
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($vendas as $venda)
                        <tr>
                            <td>{{$venda->created_at}}</td>
                            <td>{{$venda->cliente->nome}}</td>
                            <td>R${{number_format($venda->total, 2)}}</td>
                            <td>
                                <a class="btn btn-info" href="{{route('vendas.ticket', ["id"=>$venda->id])}}">
                                    <i class="fa fa-print"></i>
                                </a>
                            </td>
                            <td>
                                <a class="btn btn-success" href="{{route('vendas.show', ["id"=>$venda->id])}}">
                                    <i class="fa fa-info"></i>
                                </a>
                            </td>
                                <td>
                                    <form action="{{route('vendas.destroy', [$venda])}}" method="post">
                                        @method("delete")
                                        @csrf
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fa fa-trash"></i>
                                        </button>    
                                    </form>
                                    
                                </td>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
            
@section('js')
    <script> console.log('Hi!'); </script>
@stop
              
{{--<td>
    {{ Form::open(array('url' => 'vendas/' . $value->id, 'onsubmit' => 'return ConfirmDelete()'))}}
    {{ Form::hidden('_method', 'DELETE') }}
    {{ Form::submit('Excluir', array('class' => 'btn btn-danger'))}}
    {{ Form::close() }}
</td>

<form action="{{route('vendas.destroy', [$venda])}}" method="post">
    @method("delete")
    @csrf
    <button type="submit" class="btn btn-danger">
        <i class="fa fa-trash"></i>
    </button>    
</form>

                    <td>                
                     <a class="btn btn-success" href="{{route('vendas.show', $venda)}}">
                                    <i class="fa fa-info"></i>
                                </a>
                            </td>
--}}