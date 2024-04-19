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
            $table ->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->integer('quantity');
            $table->float('value');
            $table->enum('currency', ['GBP', 'EUR', 'USD', 'CAD', 'MXN', 'AUD', 'NZD', 'AED', 'TRY', 'CNY', 'TWD', 'JPY', 'KRW', 'SGD']);
            $table->timestampTz('date');
            $table->foreignId('payment_method_id')->constrained('payment_methods')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
