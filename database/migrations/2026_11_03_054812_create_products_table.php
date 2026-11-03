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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('barcode_number');
            $table->string('product_name');
            $table->unsignedInteger('buy_price');
            $table->unsignedInteger('sell_price');
            $table->foreignId('supplier_id')->constrained('suppliers');
            $table->timestamps();
        });

    }

    /**
     * 
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
