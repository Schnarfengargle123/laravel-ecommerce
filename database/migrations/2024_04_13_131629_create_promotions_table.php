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
        Schema::create('promotions', function (Blueprint $table) {
            $table->id();
            $table->enum('category', ['Coupon', 'Sale']);
            $table->string('title');
            $table->float('discount');
            $table->timestampTz('valid_from');
            $table->timestampTz('valid_till');
            $table->boolean('active')->default(false);
            $table->string('activation_code');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('promotions');
    }
};
