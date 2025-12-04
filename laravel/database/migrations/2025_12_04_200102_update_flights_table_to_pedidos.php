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
        // Criar tabela clients
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 100);
            $table->string('email', 100)->unique();
            $table->string('cpf', 11)->unique();
            $table->timestamps();
        });

        // Renomear flights para pedidos e remover colunas de cliente
        Schema::table('flights', function (Blueprint $table) {
            // Remover colunas antigas
            $table->dropColumn(['nomeCliente', 'cpf', 'email']);
            // Adicionar relacionamento com client
            $table->unsignedBigInteger('client_id')->nullable()->after('id');
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
        });

        // Renomear tabela
        Schema::rename('flights', 'pedidos');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::rename('pedidos', 'flights');
        
        Schema::table('flights', function (Blueprint $table) {
            $table->dropForeign(['client_id']);
            $table->dropColumn('client_id');
            $table->string('nomeCliente', 100);
            $table->string('cpf', 11);
            $table->string('email', 50)->nullable();
        });

        Schema::dropIfExists('clients');
    }
};