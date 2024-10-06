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
        Schema::create('ganados', function (Blueprint $table) {
            $table->id();
            $table->boolean("sexo"); // true: toro ; false: vaca
            $table->string("raza");
            $table->integer("proposito"); // 1: carne ; 2: leche; 3: doble
            $table->integer("tipo"); // 1: novillo; 2: novillo de levante; 3: ternero
            $table->longText("foto");
            $table->foreignId('finca_id')->references('id')->on('fincas')->onDelete('cascade');
            $table->foreignId('hierro_id')->references('id')->on('hierros')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ganados');
    }
};
