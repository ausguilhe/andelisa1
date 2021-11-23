<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{

    const CREATED_AT = 'data_criacao';
    const UPDATED_AT = 'data_alteracao';

    protected $table = 'vendas';

    public $timestamps = true;

    protected $fillable = ['numero_vendas', 'cliente_id', 'produto_id','data_criacao' , 'data_alteracao' ];   // é permitido ser inserido, senha n pederia  




    //relacionamento
    // venda tem N produtos (hasMany) Venda->produtos
    public function produtos()
    {
        return $this->hasOne( 'App\Models\Produto', 'produto_id');
    }

    /*
    select * from venda where id = 1
    select * from produtos where nome_produto = 1    */

    // Uma venda é realiza por 1 usuário (hasMany) Venda->clientes
    public function clientes()
    {
        //return $this->hasOne( 'App\cliente', 'cliente_id');
        $this->belongsTo('App\Models\Cliente', 'cliente_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
    public function vendaDetalhe()
    {
        return $this->belongsTo(vendaDetalhe::class);
    }


}
