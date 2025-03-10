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
        Schema::create('historico_tareas', function (Blueprint $table) {
            
            $table->engine="InnoDB";
            $table->id();
            $table->decimal("tiempo_estimado",15,2);
            $table->decimal("tiempo_real",15,2);
            
            $table->unsignedBigInteger("comentarios_id");
            $table->foreign('comentarios_id')->references('id')->on('comentarios');
            $table->unsignedBigInteger("tareas_id");
            $table->foreign('tareas_id')->references('id')->on('tareas');
            $table->unsignedBigInteger("usuarios_id");
            $table->foreign('usuarios_id')->references('id')->on('users');
            $table->unsignedBigInteger("estados_id");
            $table->foreign('estados_id')->references('id')->on('estados');
            


            $table->dateTime("fecha_entrega_area");
            $table->dateTime("fecha_entrega_cuentas");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historico_tareas');
    }
};
