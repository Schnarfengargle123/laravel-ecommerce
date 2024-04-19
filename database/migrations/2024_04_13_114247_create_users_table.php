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
            $table->timestampTz('email_verified_at')->nullable();
            $table->string('password');
            $table->string('username')->unique();
            $table->rememberToken();
            $table->enum('account_type', ['Guest', 'Standard', 'Admin'])->default('Guest');
            $table->boolean('registered')->default(false);
            $table->timestampTz('registration_date')->nullable();
            $table->boolean('subscribed')->default(false);
            $table->timestamp('latest_login')->nullable();
            $table->integer('visit_count')->nullable();
            $table->foreignId('cart_id')->nullable()->constrained('carts')->cascadeOnDelete();
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
