<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterExercicioTableChangeQuantidadeDeRepeticoesType extends Migration
{
    public function up()
    {
        Schema::table('exercicio', function (Blueprint $table) {
            $table->string('quantidade_de_repeticoes')->change();
        });
    }

    public function down()
    {
        Schema::table('exercicio', function (Blueprint $table) {
            $table->integer('quantidade_de_repeticoes')->change();
        });
    }
}
