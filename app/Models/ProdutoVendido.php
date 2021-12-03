<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdutoVendido extends Model
{
    protected $table = "produtos_vendidos";
    protected $fillable = ["id_venda", "descricao", "codigo_barras", "preco", "quantidade"];

}
