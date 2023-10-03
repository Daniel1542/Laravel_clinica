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
        Schema::create('agendamento', function (Blueprint $table) {
            $table->id();
            $table->string('Codigo');
            $table->datetime('data_hora_agendamento');
            $table->string('tipo_consulta'); // Plano ou Particular
            $table->boolean('retorno'); // 1 para Sim, 0 para Não
            $table->unsignedBigInteger('paciente_NomeCompleto'); // Chave estrangeira
            $table->timestamps();

            $table->foreign('paciente_NomeCompleto')->references('id')->on('paciente');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agendamento');
    }
};
