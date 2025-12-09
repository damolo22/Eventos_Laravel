<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('asistentes', function (Blueprint $table) {
            // Se añade la clave foránea `event_id` que apunta a la tabla `events`
            $table->foreignId('event_id')->nullable()->constrained()->onDelete('set null')->after('id');
        });
    }

    public function down(): void
    {
        Schema::table('asistentes', function (Blueprint $table) {
            $table->dropForeign(['event_id']);
            $table->dropColumn('event_id');
        });
    }
};
