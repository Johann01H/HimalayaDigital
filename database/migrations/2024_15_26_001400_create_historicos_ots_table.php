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
        Schema::create('historico_ots', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->id();
            $table->string("nombre",115);
            $table->string("referencia",255);
            $table->string("valor",85);
            $table->boolean("fee")->default(1);
            $table->decimal("horas_totales",15,2);
            $table->decimal("horas_disponibles",15,2);
            $table->decimal("total_horas_extra",15,2)->nullable();
            $table->mediumText("observaciones")->nullable();
            $table->string("requerimientos_ot",2050);
            $table->dateTime("fecha_inicio");
            $table->dateTime("fecha_fin");
            $table->unsignedBigInteger('clientes_id');
            $table->foreign("clientes_id")->references("id")->on("clientes");
            $table->unsignedBigInteger('user_id');
            $table->foreign("user_id")->references("id")->on("users");
            $table->unsignedBigInteger('estados_id');
            $table->foreign("estados_id")->references("id")->on("estados");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historico_ots');
    }
};
