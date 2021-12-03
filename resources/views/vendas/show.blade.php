@extends('adminlte::page')

@section('title', 'Somos "+" - Venda')

@section('content_header')

    <div class="row">
        <div class="col-12">
            <h1>Detalhe da venda #{{$venda->id_venda}}</h1>
            <h1>Cliente: <small>{{$venda->cliente->nome}}</small></h1>
    
            
            <a class="btn btn-info" href="{{route('vendas.index')}}">
                <i class="fa fa-arrow-left"></i>&nbsp;Voltar
            </a>
            <a class="btn btn-success" href="{{route('vendas.ticket', ["id" => $venda->id])}}">
                <i class="fa fa-print"></i>&nbsp;Ticket
            </a>
            <h2>produtos</h2>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Descrição</th>
                    <th>Código de barras</th>
                    <th>Preço</th>
                    <th>Quantidade</th>
                    <th>Subtotal</th>
                </tr>
                </thead>
                <tbody>
                @foreach($venda->precos as $produto)
                    <tr>
                        <td>{{$produto->descricao}}</td>
                        <td>{{$produto->codigo_barras}}</td>
                        <td>R${{number_format($produto->preco, 2)}}</td>
                        <td>{{$produto->quantidade}}</td>
                        <td>R${{number_format($produto->quantidade * $produto->preco, 2)}}</td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <td colspan="3"></td>
                    <td><strong>Total</strong></td>
                    <td>R${{number_format($total, 2)}}</td>
                </tr>
                </tfoot>
            </table>

        </div>
    </div>
@endsection

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
            
@section('js')
    <script> console.log('Hi!'); </script>
@stop
              
