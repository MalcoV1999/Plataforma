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
    Schema::create('points', function (Blueprint $table) {
        $table->id();
        $table->integer('amount');
        $table->date('load_date');
        $table->foreignId('user_id')->constrained('points', 'id')->onDelete('cascade');
        $table->timestamps();
    });
}



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('points');
    }
};
