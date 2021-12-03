<?php

namespace App\Http\Controllers;

use App\Models\venda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mike42\Escpos\PrintConnectors\FilePrintConnector;
Use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\Printer;


class VendasController extends Controller
{

    public function ticket(Request $request)
    {
        $venda = Venda::findOrFail($request->get("id"));
        $nomeimpressora = "Microsoft print to PDF";
        $connector = new WindowsPrintConnector($nomeimpressora);
        $impressora = new Printer($connector);
        $impressora->setJustification(Printer::JUSTIFY_CENTER);
        $impressora->setEmphasis(true);
        $impressora->text("Ticket de venda\n");
        $impressora->text($venda->created_at . "\n");
        $impressora->setEmphasis(false);
        $impressora->text("Cliente: ");
        $impressora->text($venda->cliente->nome . "\n");
        $impressora->text("https://andelisa.com.br\n");
        $impressora->text("\n===============================\n");
        $total = 0;
        foreach ($venda->produtos as $produto) {
            $subtotal = $produto->quantidade * $produto->preco;
            $total += $subtotal;
            $impressora->setJustification(Printer::JUSTIFY_LEFT);
            $impressora->text(sprintf("%.2fx%s\n", $produto->quantidade, $produto->descricao));
            $impressora->setJustification(Printer::JUSTIFY_RIGHT);
            $impressora->text('$' . number_format($subtotal, 2) . "\n");
        }
        $impressora->setJustification(Printer::JUSTIFY_CENTER);
        $impressora->text("\n===============================\n");
        $impressora->setJustification(Printer::JUSTIFY_RIGHT);
        $impressora->setEmphasis(true);
        $impressora->text("Total: $" . number_format($total, 2) . "\n");
        $impressora->setJustification(Printer::JUSTIFY_CENTER);
        $impressora->setTextSize(1, 1);
        $impressora->text("Obrigado pela compra\n");
        $impressora->text("https://andelisa.com.br\n");
        $impressora->feed(5);
        $impressora->close();
        return redirect()->back()->with("message", "Ticket impresso");
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vendasComTotal = Venda::join("produtos_vendidos", "produtos_vendidos.id_venda", "=", "vendas.id")
            ->select("vendas.*", DB::raw("sum(produtos_vendidos.quantidade * produtos_vendidos.preco) as total"))
            ->groupBy("vendas.id", "vendas.created_at", "vendas.updated_at", "vendas.id_cliente")
            ->get();
        return view('vendas.index', ['vendas' => $vendasComTotal,]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Venda $venda
     * @return \Illuminate\Http\Response
     */
    public function show(Venda $venda)
    {
        $total = 0;
        $venda = Venda::join('produtos', 'vendas.id_cliente', '=', 'produtos.id')
        ->select('produtos.nome as produto_id','vendas.created_at', 'produtos.preco')
        ->get();

        $total = 0;
        foreach($venda as $item) {
            $total += $item->preco;
        }
        
        return view('vendas.show', compact( 'total'));
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Venda $venda
     * @return \Illuminate\Http\Response
     */
    public function edit(Venda $venda)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Venda $venda
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Venda $venda)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Venda $venda
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $venda = Venda::findOrFail($id);
        $venda->delete();
        return redirect()->route('vendas.index')->with('message', 'Venda excluida com sucesso!');
    }

    public function pdf(Venda $venda)
    {
        $subtotal = 0 ;
        $produtoVendidos = $venda->produtoVendidos;
        foreach ($produtoVendidos as $produtoVendido) {
            $subtotal += $produtoVendido->quantidade*$produtoVendido->preco-$produtoVendido->quantidade* $produtoVendido->preco*$produtoVendido->discount/100;
        }

        $pdf = PDF::loadView('vendas.pdf', compact('venda', 'subtotal', 'produtoVendidos'));
        return $pdf->download('Relatorio_de_venda_'.$venda->id.'.pdf');
    }

    public function print(Venda $venda)
    {
        try {
            $subtotal = 0 ;
            $produtoVendidos = $venda->produtoVendidos;
            foreach ($produtoVendidos as $produtoVendido) {
                $subtotal += $produtoVendido->quantidade*$produtoVendido->preco-$produtoVendido->quantidade* $produtoVendido->preco*$produtoVendido->discount/100;
            }  

            $printer_name = "MP-4200TH";
            $connector = new WindowsPrintConnector($printer_name);
            $printer = new Printer($connector);

            $printer->text("€ 9,95\n");

            $printer->cut();
            $printer->close();


            return redirect()->back();

        } catch (\Throwable $th) {
            return redirect()->back();
        }
    }

     /*public function destroy(Venda $venda)
    {
        $venda->delete();
        return redirect()->route('vendas.index')
            ->with('message', "venda eliminada");
    }*/
}
