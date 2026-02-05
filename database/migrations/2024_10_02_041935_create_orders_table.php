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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('total');
            $table->string('state');
            $table->boolean('wholesale');
            //$table->foreignId('method_id')->constrained('pay_methods');
            $table->foreignId('address_id')->constrained('addresses');
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade');
            $table->foreignId('code_id')->nullable()->constrained('codes')->onDelete('cascade');
            $table->string('email')->nullable();
            $table->char('celular',length:10)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //Schema::table('orders', function (Blueprint $table) {
        //    $table->dropColumn('address_id')->on('addresses')->onDelete('cascade');
        //});
        Schema::dropIfExists('orders');
    }
};
