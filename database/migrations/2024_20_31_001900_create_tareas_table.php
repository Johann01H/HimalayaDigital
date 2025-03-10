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
        Schema::create('tareas', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->id();
            $table->string('nombre_tarea',1024);
            $table->dateTime('fecha_entrega_area')->nullable();
            $table->dateTime('fecha_entrega_cuentas')->nullable();
            $table->longText('descripcion');
            $table->longText('enlaces_externos')->nullable();
            $table->decimal('tiempo_estimado',15,2);
            $table->decimal('tiempo_real',15,2);
            $table->decimal('tiempo_mapa_cliente',15,2);
            $table->boolean('recurrente')->default(1);
            $table->timestamp("fecha_inicio_recurrencia")->nullable();
            $table->string('id_evento',502);
            $table->string('fecha_inicio_programa',502);
            $table->string('fecha_fin_programa',502);
            $table->dateTime('fecha_tentativa_cliente');
            $table->dateTime('fecha_entrega_cliente_real');
            $table->boolean('mostrar_cliente')->default(1);
            $table->unsignedBigInteger('estados_id');
            $table->foreign('estados_id')->references('id')->on('estados');
            $table->unsignedBigInteger('areas_id');
            $table->foreign('areas_id')->references('id')->on('areas');
            $table->unsignedBigInteger('usuarios_id');
            $table->foreign('usuarios_id')->references('id')->on('users');
            $table->unsignedBigInteger('ots_id');
            $table->foreign('ots_id')->references('id')->on('ots');
            $table->unsignedBigInteger('planeaciones_fases_id');
            $table->foreign('planeaciones_fases_id')->references('id')->on('planeacion_tipos');
            $table->unsignedBigInteger('requerimientos_clientes_id');
            $table->foreign('requerimientos_clientes_id')->references('id')->on('requerimientos_clientes');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tareas');
    }
};
