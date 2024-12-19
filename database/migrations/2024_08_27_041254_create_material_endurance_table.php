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
        Schema::create('material_endurance', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->foreignId('material_id')->constrained()->onDelete('cascade');
            $table->foreignId('endurance_id')->constrained()->onDelete('cascade');
            //$table->foreign('material_id')->references('id')->on('materials')->onDelete('cascade');
            //$table->foreign('endurance_id')->references('id')->on('endurances')->onDelete('cascade');
            //$table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->float('precio');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('material_endurance');
    }
};
