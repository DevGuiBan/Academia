<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('personal_trainers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('personal_id')->unique();
            $table->string('address')->nullable();
            $table->string('password');
            $table->string('email')->unique();
            $table->string('stage')->nullable(); // nao sei como a gente vai usar exatamente 
            $table->string('contract')->nullable(); //tipo de contrato ou validade? 
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personal_trainers');
    }
};
