<?php 

use App\Models\Venda;
use App\Models\Produto;

 //nome-data-preço
 $relatorios = Venda::join('produtos', 'vendas.id_cliente', '=', 'produtos.id')
 ->select('produtos.nome as produto_id','vendas.created_at', 'produtos.preco')
 ->get();


 
 $total = 0;
        foreach($relatorios as $item) {
            $total += $item->preco;
        }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Relatorios</title>

    <style>
        
        table {
            width: 100%;
        }
        
        tr:nth-child(even) {background-color: #f2f2f2;}

        th {
  background-color: black;
  color: white;
}
       
</style>

</head>
<body>

<div>
    <h3 class="page-header">Relatório</h3>
</div>
<hr>
    
<table class="table">
    <thead style="background: #F5F5F5;">
    <tr>
        <th>Nome</th>
        <th>Preço</th>
        <th class="text-right">Data de criação</th>
    </tr>
    </thead>

    <tbody> 
   @foreach ($relatorios as $relatorio )   
    <tr>
    <td>{{ $relatorio->produto_id }}</td>
    <td>{{ $relatorio->created_at }}</td>
    <td>R$ {{ $relatorio->preco }}</td>      
    </tr> 
    @endforeach
    <tr >
     <td >Total</th>
     <td ></td>
     <td >{{ $total }}</td>                                
    </tr>   
    </tbody>
</table>


</body>
</html>

