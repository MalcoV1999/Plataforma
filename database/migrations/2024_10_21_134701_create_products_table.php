<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('products', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('sku');
        $table->boolean('status')->default(true);
        $table->string('image')->nullable();
        $table->foreignId('category_id')->constrained()->onDelete('cascade');
        $table->foreignId('region_id')->constrained();
        $table->decimal('price', 8, 2);
        $table->integer('points_price');
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
