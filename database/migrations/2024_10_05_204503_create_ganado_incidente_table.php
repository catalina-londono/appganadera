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
        Schema::create('ganado_incidente', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("ganado_id");
            $table->foreign("ganado_id")->references("id")->on("ganados")->onDelete("cascade");
            $table->unsignedBigInteger("incidente_id");
            $table->foreign("incidente_id")->references("id")->on("incidentes")->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ganado_incidente');
    }
};
