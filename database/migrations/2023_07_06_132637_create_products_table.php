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
            $table->foreignId('category_id')->constrained('category')->onDelete('cascade');
            $table->string('name');
            $table->longText('desc');
            $table->integer('original_price');
            $table->integer('selling_price');
            $table->string('image');
            $table->string('quantity');
            $table->string('type');
            $table->string('design');
            $table->tinyInteger('designType')->default('0');
            $table->string('themes');
            $table->string('size_list');
            $table->string('couple_men_size');
            $table->string('couple_women_size');
            $table->string('status');
            $table->string('trending');
            $table->string('freq_bought');
            $table->string('offer_menu');
            $table->string('offer_msg');
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
