<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 100);
            $table->string('email', 100)->unique();
            $table->string('cpf', 11)->unique();
            $table->timestamps();
        });

        Schema::table('flights', function (Blueprint $table) {
            $table->dropColumn(['nomeCliente', 'cpf', 'email']);
            $table->unsignedBigInteger('client_id')->nullable()->after('id');
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
        });

        Schema::rename('flights', 'pedidos');
    }

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
