<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProdutoVendidos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos_vendidos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("id_venda");
            $table->foreign("id_venda")
                ->references("id")
                ->on("vendas")
                ->onDelete("cascade")
                ->onUpdate("cascade");
            $table->string("descricao");
            $table->string("codigo_barras");
            $table->decimal("preco", 9, 2);
            $table->decimal("quantidade", 9, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produtos_vendidos');
    }

}
