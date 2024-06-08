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
        //
        Schema::create('puntos_gps', function (Blueprint $table) {
            $table->id();
            $table->string('dispositivo');
            $table->longText('imei');
            $table->string('tiempo');
            $table->string('placa');
            $table->longText('version');
            $table->string('longitud');
            $table->string('latitud');
            $table->dateTime('recepcion');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('puntos_gps');
    }
};
