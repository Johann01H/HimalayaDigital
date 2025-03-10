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
        Schema::create('planeacion_fases', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->id();
            $table->string('nombre',80);
            $table->unsignedBigInteger('planeaciones_tipos_id');
            $table->foreign('planeaciones_tipos_id')->references('id')->on('planeacion_tipos');
            $table->boolean('estado')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('planeacion_fases');
    }
};
