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
        Schema::create('estados', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->string("nombre",45);
            $table->unsignedBigInteger("tipos_estados_id");
            $table->foreign("tipos_estados_id")->references("id")->on("tipos_estados");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estados');
    }
};
