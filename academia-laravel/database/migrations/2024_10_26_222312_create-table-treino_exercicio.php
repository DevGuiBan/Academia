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
        Schema::create('treino_exercicio', function (Blueprint $table) {
            $table->unsignedBigInteger('treino_id')->primary();
            $table->unsignedBigInteger('aluno_id');
            
            $table->foreign('treino_id')
                ->references('id')
                ->on('treino')
                ->onDelete('cascade');
            $table->foreign('aluno_id')
                ->references('id')
                ->on('alunos')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
