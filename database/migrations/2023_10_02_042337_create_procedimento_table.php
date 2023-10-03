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
        Schema::create('procedimento', function (Blueprint $table) {
            $table->id();
            $table->string('Codigo');
            $table->string('Descricao');
            $table->string('Valor');
            $table->string('Observacoes');
            $table->unsignedBigInteger('procedimento_id'); 
            $table->timestamps();
            $table->foreign('procedimento_id')->references('id')->on('procedimento');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('procedimento');
    }
};
