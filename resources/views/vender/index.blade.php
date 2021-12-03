@extends('adminlte::page')

@section('title', 'SOMOS "+" - Vender produtos')

@section('content_header')

    <div class="row">
        <div class="col-12">
            <h1>Nova venda <i class="fa fa-cart-plus"></i></h1>
@stop

@section('content')
   
            <div class="row">
                <div class="col-12 col-md-6">
                    <form action="{{route("terminarOCancelarvenda")}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="id_cliente">Cliente</label>
                            <select required class="form-control" name="id_cliente" id="id_cliente">
                                @foreach($clientes as $cliente)
                                    <option value="{{$cliente->id}}">{{$cliente->nome}}</option>
                                @endforeach
                            </select>
                        </div>
                        @if(session("produtos") !== null)
                            <div class="form-group">
                                <button name="accion" value="terminar" type="submit" class="btn btn-success">Terminar
                                    venda
                                </button>
                                <button name="accion" value="cancelar" type="submit" class="btn btn-danger">Cancelar
                                    venda
                                </button>
                            </div>
                        @endif
                    </form>
                </div>
                <div class="col-12 col-md-6">
                    <form action="{{route("agregarprodutovenda")}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="codigo">Código de barras</label>
                            <input id="codigo" autocomplete="off" required autofocus name="codigo" type="text"
                                   class="form-control"
                                   placeholder="Código de barras">
                        </div>
                    </form>
                </div>
            </div>
            @if(session("produtos") !== null)
                <h2>Total: R${{number_format($total, 2)}}</h2>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Código de barras</th>
                            <th>Descrição</th>
                            <th>Preco</th>
                            <th>Quantidade</th>
                            <th>Quitar</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach(session("produtos") as $produto)
                            <tr>
                                <td>{{$produto->codigo_barras}}</td>
                                <td>{{$produto->descricao}}</td>
                                <td>R${{number_format($produto->preco, 2)}}</td>
                                <td>{{$produto->quantidade}}</td>
                                <td>
                                    <form action="{{route("quitarprodutoDevenda")}}" method="post">
                                        @method("delete")
                                        @csrf
                                        <input type="hidden" name="indice" value="{{$loop->index}}">
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <h2>Sua venda será exibida:
                    <br>
                    Escanear o código de barras ou pressione Enter</h2>
            @endif
        </div>
    </div>
@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
            
@section('js')
    <script> console.log('Hi!'); </script>
@stop
              