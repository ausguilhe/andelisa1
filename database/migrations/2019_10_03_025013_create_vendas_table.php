<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {


        Schema::create('vendas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('numero_vendas');
            $table->string('data_criacao');
            $table->string('data_alteracao');
            //table->string('nome_cliente');
            //$table->string('nome_produto');    

           //$table->BigInteger('cliente_id')->unsigned();
           $table->unsignedBigInteger('user_id');

           $table->unsignedBigInteger('produto_id');

           $table->foreign('cliente_id')
                ->references('id')
                ->on('clientes')
                ->onDelete('cascade');

            $table->foreign('produto_id')
                ->references('id')
                ->on('produtos')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vendas');
    }
}
