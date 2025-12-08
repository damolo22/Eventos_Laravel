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
        Schema::create('asistente_event', function (Blueprint $table) {
            $table->foreignId('asistente_id')->constrained()->onDelete('cascade'); 
            // Clave Foránea de Eventos
            $table->foreignId('event_id')->constrained()->onDelete('cascade'); 
            // Define la clave primaria compuesta
            $table->primary(['asistente_id', 'event_id']); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asistente_event');
    }
};
