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
        Schema::create('comentarios', function (Blueprint $table) {

            $table->engine="InnoDB";
            $table->id();
            $table->longText("comentarios");

            $table->unsignedBigInteger("usuarios_comentarios_id");
            $table->foreign("usuarios_comentarios_id")->references("id")->on("users");







            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comentarios');
    }
};
