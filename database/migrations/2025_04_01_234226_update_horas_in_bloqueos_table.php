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
        Schema::table('bloqueos', function (Blueprint $table) {
            $table->dropColumn('hora'); // Elimina la anterior si existe
            $table->time('hora_inicio')->nullable();
            $table->time('hora_fin')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bloqueos', function (Blueprint $table) {
            $table->dropColumn(['hora_inicio', 'hora_fin']);
            $table->time('hora')->nullable(); // Reversa
        });
    }
};
