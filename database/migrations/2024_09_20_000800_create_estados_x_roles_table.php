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
        Schema::create('estados_x_roles', function (Blueprint $table) {
          
            $table->engine="InnoDB";
            $table->id();
            $table->unsignedBigInteger("estados_id");
            $table->unsignedBigInteger("roles_id");

            $table->foreign("estados_id")->references("id")->on("estados");
            $table->foreign("roles_id")->references("id")->on("roles");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estados_x_roles');
    }
};
