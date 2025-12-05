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
        Schema::table('produto', function (Blueprint $table) {
            $table->foreignId('client_id')
                ->nullable()
                ->constrained('clients')
                ->cascadeOnDelete();
        });
    }


    public function down(): void
    {
        Schema::table('produto', function (Blueprint $table) {
            if (Schema::hasColumn('produto', 'client_id')) {
                $table->dropForeign(['client_id']);
                $table->dropColumn('client_id');
            }
        });
    }
};
