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
            $table->foreignId('brand_id')->constrained('brands')->cascadeOnDelete();;
            $table->enum('category', ['Fragrance', 'Body Spray', 'Body Wash', 'Aftershave Lotion']);
            $table->enum('concentration', ['Eau Fraîche', 'Eau de Cologne', 'Eau de Toilette', 'Eau de Parfum', 'Parfum']);
            $table->enum('volume', ['30ml', '50ml', '60ml', '70ml', '75ml', '80ml', '90ml', '100ml', '118ml', '120ml', '125ml', '150ml', '160ml', '180ml', '200ml', '250ml', '500ml']);
            $table->float('price');
            $table->integer('quantity');
            $table->foreignId('brand-id');
            $table->boolean('availability');
            $table->foreignId('product_images_id')->constrained('product_images')->cascadeOnDelete();
            $table->foreignId('product_group_id')->constrained('product_groups')->cascadeOnDelete();
            $table->foreignId('product_line_id')->constrained('product_lines')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
