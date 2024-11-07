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
        Schema::create('notificacoes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_personal');
            $table->unsignedBigInteger('id_aluno');
            $table->unsignedBigInteger('id_treino');
            $table->string('mensagem');
            $table->boolean('lida')->default(false);
            $table->timestamps();
        
            $table->foreign('id_personal')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_aluno')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_treino')->references('id')->on('treino')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notificacoes');
    }
};
