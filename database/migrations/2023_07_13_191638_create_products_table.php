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
            $table->text('image');
            $table->string('name');
            $table->string('slug')->nullable();
            $table->foreignId('category_id')->constrained('categories');
            $table->tinyInteger('status')->default(0);
            $table->bigInteger('quantity');
            $table->bigInteger('price');
            $table->float('discount')->nullable();
            $table->integer('selled')->nullable();
            $table->softDeletes();
            $table->timestamps();
            // $table->unsignedBigInteger('category_id');
            // $table->foreign('category_id')->references('id')->on('categories');
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
