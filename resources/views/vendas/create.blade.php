@extends('adminlte::page')

@section('title', 'Vendas')

@section('content_header')

    <h1>FAZER VENDA</h1>
    
  @stop

  @section('content')

   
<section id="container" class="">
    <section id="main-content">
      <section class="wrapper">
      
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-cart-arrow-down""></i> Nova Venda</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i>Novo</li>
              <li><i class="fa fa-cart-arrow-down"></i><a href="{{ URL::to('vendas') }}">Vendas</a></li> 
              <li><i class="fa fa-plus-square-o"></i>Adicionar</li>
            </ol>
          </div>
        </div>


        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif


        <!-- Form validations -->
        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                Formulário
              </header>
              <div class="panel-body">
                <div class="form">


                  <form class="form-validate form-horizontal" id="feedback_form" method="post" action="">
                  @csrf

                  <div class="form-group">
                    <label class="control-label col-lg-2" for="inputSuccess">clientes</label>
                    <div class="col-lg-10">        
                    <select name="cliente_id" id="cliente_id" class="form-control m-bot15">
                      @foreach($clientes as $clientes)
                            <option value= "{{ $clientes->id }}"> {{ $clientes->nome }}</option>
                      @endforeach
                    </select>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-lg-2" for="inputSuccess">Produto</label>
                    <div class="col-lg-10">                
                    <select name="produto_id" id="produto_id" class="form-control m-bot15">                           
                      @foreach($produtos as $produto)
                            <option value= "{{ $produto->id }}"> {{ $produto->nome }}</option>
                      @endforeach
                    </select>
                    </div>                     
                </div>
                  
                  <div class="form-group ">
                      <label for="numero_vendas" class="control-label col-lg-2">Quantidade<span>*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control" id="numero_vendas" name="numero_vendas" type="text"  />
                      </div>
                    </div>
                                                    
                  <a href="{{ URL::to('vendas/') }}" class="btn btn-secondary">Voltar</a>
                  <button type="submit" class="btn btn-primary">Gravar</button>      
                                      

                  </form>
                </div>
              </div>
            </section>
          </div>
        </div>       
      </section>
    </section>
</section>
    

@stop



        @section('css')
            <link rel="stylesheet" href="/css/admin_custom.css">
        @stop
            
        @section('js')
            <script> console.log('Hi!'); </script>
        @stop
               