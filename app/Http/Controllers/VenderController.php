<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Produto;
use App\Models\ProdutoVendido;
use App\Models\Venda;
use Illuminate\Http\Request;

class VenderController extends Controller
{

    public function terminarOCancelarvenda(Request $request)
    {
        if ($request->input("accion") == "terminar") {
            return $this->terminarvenda($request);
        } else {
            return $this->cancelarvenda();
        }
    }

    public function terminarvenda(Request $request)
    {
        // Criar uma venda
        $venda = new venda();
        $venda->id_cliente = $request->input("id_cliente");
        $venda->saveOrFail();
        $idvenda = $venda->id;
        $produtos = $this->obterprodutos();
        // Recorrer carrinho de compras
        foreach ($produtos as $produto) {
            // o produto que se vende...
            $produtoVendido = new ProdutoVendido();
            $produtoVendido->fill([
                "id_venda" => $idvenda,
                "descricao" => $produto->descricao,
                "codigo_barras" => $produto->codigo_barras,
                "preco" => $produto->preco,
                "quantidade" => $produto->quantidade,
            ]);
            // salvamos
            $produtoVendido->saveOrFail();
            // verificado o estoque original
            $produtoAtualizado = Produto::find($produto->id);
            $produtoAtualizado->estoque -= $produtoVendido->quantidade;
            $produtoAtualizado->saveOrFail();
        }
        $this->vaciarprodutos();
        return redirect()
            ->route('vender.index')
            ->with("message", "venda terminada");
    }

    private function obterprodutos()
    {
        $produtos = session("produtos");
        if (!$produtos) {
            $produtos = [];
        }
        return $produtos;
    }

    private function vaciarprodutos()
    {
        $this->guardarprodutos(null);
    }

    private function guardarprodutos($produtos)
    {
        session(["produtos" => $produtos,
        ]);
    }

    public function cancelarvenda()
    {
        $this->vaciarprodutos();
        return redirect()
            ->route('vender.index')
            ->with("message", "venda cancelada");
    }

    public function quitarprodutoDevenda(Request $request)
    {
        $indice = $request->post("indice");
        $produtos = $this->obterprodutos();
        array_splice($produtos, $indice, 1);
        $this->guardarprodutos($produtos);
        return redirect()
            ->route('vender.index');
    }

    public function agregarprodutovenda(Request $request)
    {
        $codigo = $request->post("codigo");
        $produto = Produto::where("codigo_barras", "=", $codigo)->first();
        if (!$produto) {
            return redirect()
                ->route('vender')
                ->with("message", "produto não encontrado");
        }
        $this->agregarprodutoACarrinho($produto);
        return redirect()
            ->route('vender.index');
    }

    private function agregarprodutoACarrinho($produto)
    {
        if ($produto->estoque <= 0) {
            return redirect()->route("vender.index")
                ->with([
                    "message" => "Não estoque do produto",
                    "tipo" => "danger"
                ]);
        }
        $produtos = $this->obterprodutos();
        $posibleIndice = $this->buscarIndiceDeproduto($produto->codigo_barras, $produtos);
        // o produto não foi encontrado
        if ($posibleIndice === -1) {
            $produto->quantidade = 1;
            array_push($produtos, $produto);
        } else {
            if ($produtos[$posibleIndice]->quantidade + 1 > $produto->estoque) {
                return redirect()->route('vender.index')
                    ->with([
                        "message" => "Não dá para adicionar mais produtos desse tipo, eles ficariam sem estoque",
                        "tipo" => "danger"
                    ]);
            }
            $produtos[$posibleIndice]->quantidade++;
        }
        $this->guardarprodutos($produtos);
    }

    private function buscarIndiceDeproduto(string $codigo, array &$produtos)
    {
        foreach ($produtos as $indice => $produto) {
            if ($produto->codigo_barras === $codigo) {
                return $indice;
            }
        }
        return -1;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $total = 0;
        foreach ($this->obterprodutos() as $produto) {
            $total += $produto->quantidade * $produto->preco;
        }
        return view('vender.index',
            [
                "total" => $total,
                "clientes" => Cliente::all(),
            ]);
    }
}
