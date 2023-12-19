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
        Schema::create('useraddresses', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('full_name')->nullable();
            $table->string('address')->nullable();
            $table->string('landmark')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->integer('pincode')->nullable();
            $table->integer('phone')->nullable();
            $table->string('address_type')->nullable();
            $table->text('delivery_instr')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('useraddresses');
    }
};
