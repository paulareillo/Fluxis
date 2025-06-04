<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration
{
    public function up(): void
    {
        Schema::create('altas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellidos');
            $table->string('email');
            $table->date('fecha_entrada');
            $table->enum('estado', ['pendiente', 'en proceso', 'terminado', 'cancelado'])->default('pendiente');
            $table->unsignedBigInteger('jefe_id');

            $table->timestamps();

            $table->foreign('jefe_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('altas');
    }
};
