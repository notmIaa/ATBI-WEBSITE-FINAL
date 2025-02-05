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
        Schema::create('incubatee_products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('incubatee_id')->constrained('incubatees'); 
            $table->string('product_image')->nullable();
            $table->string('product_name')->unique();
            $table->text('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('incubatee_products');
    }
};
