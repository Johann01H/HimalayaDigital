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
        Schema::create('clientes', function (Blueprint $table) {
            $table->engine ="InnoDB";
            $table->id();
            $table->string('nombre', 115);
            $table->string("nit",45);
            $table->string("email",115)->unique();
            $table->string("telefono")->nullable();
            $table->string("nombre_contacto",45);
            $table->boolean("estado")->default(1);
            $table->string("razon_social",255);
            $table->unsignedBigInteger('users_id');
            $table->foreign('users_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
