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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('username');
            $table->rememberToken();
            $table->enum('account_type', ['guest','standard', 'admin'])->default('guest');
            $table->boolean('registered')->default(false);
            $table->timestamp('registration_date')->nullable();
            $table->boolean('subscribed')->default(false);
            $table->foreignId('address_id')->constrained();
            $table->foreignId('favourite_id')->constrained();
            $table->foreignId('cart_id')->constrained();
            $table->foreignId('order_id')->constrained();
            $table->foreignId('payment_method_id')->constrained();
            $table->foreignId('review_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
