<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement('CREATE OR REPLACE  VIEW citas_pacientes as SELECT citas.*,pacientes.nombre,pacientes.telefono,pacientes.comentarios as comentarios_paciente,pacientes.deleted_at as activo FROM citas left JOIN pacientes ON pacientes.id = citas.paciente_id and pacientes.deleted_at is null;');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP VIEW citas_pacientes");
    }
};
