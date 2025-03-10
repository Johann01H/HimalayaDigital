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
        Schema::create('notificaciones', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->char("id",36)->primary();
            $table->string("type",255);         
            $table->unsignedBigInteger("notifiable_id");
            $table->string("notifiable_type");
            $table->text("data");
            $table->timestamp("read_at")->nullable(); 
            $table->timestamps();
            $table->index(['notifiable_id','notifiable_type']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notificaciones');
    }
};
