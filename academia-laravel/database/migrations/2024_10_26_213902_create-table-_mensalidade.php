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
        Schema::create('mensalidade', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('aluno_id');
            $table->boolean('status');
            $table->timestamp('data_pagamento');
            $table->string('forma_pagamento');
            $table->decimal('valor');
            $table->unsignedBigInteger('plano_id');

            $table->foreign('aluno_id')
                ->references('id')
                ->on('alunos')
                ->onDelete('cascade');
            $table->foreign('plano_id')
                ->references('id')
                ->on('planos')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mensalidade');
    }
};
