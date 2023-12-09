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
        Schema::create('pacientes', function (Blueprint $table) {
            $table->id();
            $table->string('NomeCompleto');
            $table->date('DataNascimento');
            $table->string('RG');
            $table->string('CPF');
            $table->string('Endereco');
            $table->string('Telefone');
            $table->string('Email');
            $table->date('Datacadastro');
            $table->string('Historico');
            $table->string('Informacoes');
            $table->unsignedBigInteger('paciente_id')->nullable(); 
            $table->timestamps();

            $table->foreign('paciente_id')->references('id')->on('pacientes')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pacientes');
    }
};
