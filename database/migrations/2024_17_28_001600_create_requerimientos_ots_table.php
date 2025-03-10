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
        Schema::create('requerimientos_ots', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->id();
            $table->string("nombre",215);
            $table->decimal("horas",15,2);
            $table->unsignedBigInteger('areas_id');
            $table->foreign('areas_id')->references('id')->on('areas');
            $table->unsignedBigInteger('ots_id');
            $table->foreign('ots_id')->references('id')->on('ots');
            $table->timestamps();
            $table->softDeletes();
            

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requerimientos_ots');
    }
};
