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
            $table->foreignId('user_id')->constrained('users');
            $table->smallInteger('address_id')->nullable();
            $table->smallInteger('total_price')->nullable();
            $table->tinyInteger('status')->default('0');
            $table->string('payment_mode')->nullable();
            $table->string('payment_id')->nullable();
            $table->string('message')->nullable();
            $table->string('tracking_no')->nullable();
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
