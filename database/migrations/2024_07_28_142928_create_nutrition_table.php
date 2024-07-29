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
    Schema::create('nutrition', function (Blueprint $table) {
        $table->integer('id')->primary()->autoIncrement();
        $table->integer('product_id');
        $table->string('calories');
        $table->string('fat');
        $table->string('protein');
        $table->string('carbohydrates');
        $table->timestamps();

        $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nutrition');
    }
};
