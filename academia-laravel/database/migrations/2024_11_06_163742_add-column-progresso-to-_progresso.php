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
        Schema::table('progresso', function (Blueprint $table) {
            $table->integer('progresso');
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('progresso', function (Blueprint $table) {
            $table->dropColumn('progresso'); 
            $table->dropTimestamps(); 
        });
    }
};
