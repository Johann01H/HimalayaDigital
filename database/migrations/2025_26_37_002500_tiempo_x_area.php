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
        Schema::create('tiempo_x_area', function(Blueprint $table){
            $table->engine='InnoDB';
            $table->id();
            $table->decimal('tiempo_estimado_ot',15,2);
            $table->decimal('tiempo_extra',15,2);
            $table->unsignedBigInteger('ots_id');
            $table->foreign('ots_id')->references('id')->on('ots');
            $table->unsignedBigInteger('areas_id');
            $table->foreign('areas_id')->references('id')->on('areas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tiempo_x_area');
    }
};
