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
        Schema::create('agendamentos', function (Blueprint $table) {
            $table->id();
            $table->string('Codigo');
            $table->datetime('data_hora_agendamento');
            $table->string('CodPaciente'); 
            $table->string('Nome'); 
            $table->string('CPF'); 
            $table->string('Telefone'); 
            $table->boolean('tipo_consulta')->default(false); // Plano ou Particular
            $table->boolean('retorno')->default(false); // 1 para Sim, 0 para Não
            $table->unsignedBigInteger('paciente_id')->default(1);
            $table->unsignedBigInteger('medico_id')->default(1); 
            $table->timestamps();

            $table->foreign('medico_id')->references('id')->on('medicos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('paciente_id')->references('id')->on('pacientes')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agendamentos');
    }
};
