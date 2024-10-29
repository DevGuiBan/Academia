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
        Schema::create('treino', function (Blueprint $table) {
            $table->id();
            $table->string('musculo');
            $table->string('tipo_de_treino');
            $table->unsignedBigInteger('personal_id');
            $table->timestamps();

            $table->foreign('personal_id')
                ->references('id')
                ->on('personal')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('treino');
    }
};
