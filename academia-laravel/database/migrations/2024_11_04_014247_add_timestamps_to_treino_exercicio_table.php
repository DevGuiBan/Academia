<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTimestampsToTreinoExercicioTable extends Migration
{
    public function up()
    {
        Schema::table('treino_exercicio', function (Blueprint $table) {
            $table->timestamps(); // Adiciona created_at e updated_at
        });
    }

    public function down()
    {
        Schema::table('treino_exercicio', function (Blueprint $table) {
            $table->dropTimestamps(); // Remove created_at e updated_at
        });
    }
}
