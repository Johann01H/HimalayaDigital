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
        Schema::create('trafico_tareas', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->id();
            $table->string("nombre",115);
            $table->dateTime("fecha_entrega_estimada");
            $table->string("descripcion",255);
            $table->string("enlaces_externos",150);
            $table->decimal("tiempo_estimado",15,2);
            $table->decimal("tiempo_real",15,2);
            $table->dateTime("fecha_entrega_cliente");
            $table->unsignedBigInteger('estados_id');
            $table->foreign('estados_id')->references('id')->on('estados');
            $table->unsignedBigInteger('areas_id');
            $table->foreign('areas_id')->references('id')->on('areas');
            $table->unsignedBigInteger('users_id');
            $table->foreign('users_id')->references('id')->on('users');
            $table->unsignedBigInteger('ots_id');
            $table->foreign('ots_id')->references('id')->on('ots');
            $table->unsignedBigInteger('roles_id');
            $table->foreign('roles_id')->references('id')->on('roles');
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trafico_tareas');
    }
};
