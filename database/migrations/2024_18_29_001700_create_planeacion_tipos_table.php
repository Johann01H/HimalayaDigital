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
        Schema::create('planeacion_tipos', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->id();
            $table->string("nombre",80);
            $table->string("descripcion",250);
            $table->boolean('estados')->default(1);
            $table->unsignedBigInteger('areas_id');
            $table->foreign('areas_id')->references('id')->on('areas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('planeacion_tipos');
    }
};
