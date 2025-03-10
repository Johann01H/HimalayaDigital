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
        Schema::create('historico_clientes', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->id();
            $table->string("nombre",115);
            $table->string("nit",45);
            $table->string("email",115)->nullable();
            $table->string("telefono",45)->nullable();
            $table->string("nombre_contacto",45)->nullable();
            $table->string("razon_social",255)->nullable();
            $table->unsignedBigInteger("clientes_id");
            $table->foreign("clientes_id")->references("id")->on("clientes")->onDelete('cascade');
            $table->unsignedBigInteger('users_id');
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historico_clientes');
    }
};
