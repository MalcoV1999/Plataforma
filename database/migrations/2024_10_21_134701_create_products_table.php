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
        $table->increments('id');
        $table->string('name');
        $table->string('sku');
        $table->boolean('status')->default(true);
        $table->string('image')->nullable();
        $table->integer('points_price')->nullable();
        $table->foreignId('category_id')->constrained('products', 'id')->onDelete('cascade');
        $table->foreignId('region_id')->constrained('products', 'id')->onDelete('cascade');
        $table->foreignId('point_id')->constrained('products', 'id')->onDelete('cascade');
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
