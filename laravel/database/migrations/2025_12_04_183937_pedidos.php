<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('flights', function (Blueprint $table) {
            $table->id();
            $table->string('nomeCliente',length: 100);
            $table->string('cpf', length: 11);
            $table->string('email', length:50 )->nullable(true);
            $table->dateTime('dtPedido');
            $table->string('codBarras');
            $table->string('nomeProduto', length:50)->nullable(true);
            $table->float('valorUnitario');
            $table->integer('qtd');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
