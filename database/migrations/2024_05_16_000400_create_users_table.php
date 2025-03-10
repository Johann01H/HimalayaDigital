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
        Schema::create('users', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->id();
            $table->string('nombre',45);
            $table->string('apellido',45);
            $table->string("cargo",85);
            $table->string("telefono")->nullable();
            $table->string("email")->unique()->index();
            $table->string('direccion',100);
            $table->boolean("estado")->default(1)->index();
            $table->decimal("horas_disponibles", 15,2);
            $table->decimal("horas_gastadas", 15,2);
            $table->string("api_token")->unique();
            $table->string("password",255);
            $table->rememberToken();
            $table->date("fecha_nacimiento");
            $table->string("img_perfil",300);
            $table->unsignedBigInteger("roles_id")->index();
            $table->foreign("roles_id")->references("id")->on("roles");
            $table->unsignedBigInteger(column: "areas_id")->index();
            $table->foreign("areas_id")->references("id")->on("areas");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
