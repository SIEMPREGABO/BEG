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
        Schema::create('paquetes_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('paquete_id')->constrained('paquetes');
            $table->foreignId('producto_id')->constrained('products');
            $table->integer('unidad_numero'); 
            $table->decimal('posicion_x', 8, 2); 
            $table->decimal('posicion_y', 8, 2); 
            $table->decimal('posicion_z', 8, 2); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paquetes_items');
    }
};
