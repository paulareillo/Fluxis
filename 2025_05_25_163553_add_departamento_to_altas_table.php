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
        Schema::table('altas', function (Blueprint $table) {
            // Cambiamos el campo departamento a ENUM con los valores permitidos
            $table->enum('departamento', [
                'RRHH', 
                'Sistemas', 
                'Ciberseguridad', 
                'Ventas', 
                'Marketing', 
                'Web', 
                'Atención al Cliente'
            ])->after('email')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('altas', function (Blueprint $table) {
            $table->dropColumn('departamento');
        });
    }
};
