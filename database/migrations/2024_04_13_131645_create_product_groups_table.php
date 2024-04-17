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
        Schema::create('product_groups', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->foreignId('brand_id')->constrained('brands')->cascadeOnDelete();
            $table->string('description');
            $table->enum('category', ['Aftershave', 'Deodorant', 'Fragrance', 'Shower Gel']);
            $table->integer('year');
            $table->enum('gender', ['M', 'F', 'U']);
            $table->integer('quantity');
            $table->string('availability');
            $table->foreignId('product_id')->constrained('products')->cascadeOnDelete();
            $table->foreignId('product_line_id')->constrained('product_lines')->cascadeOnDelete();
            $table->foreignId('review_id')->constrained('reviews')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_groups');
    }
};
