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
        $table->integer('id')->primary()->autoIncrement();
        $table->string('name');
        $table->string('slug');
        $table->string('display_name')->nullable();
        $table->string('unit_size');
        $table->enum ('unit_type', ['g', 'ml', 'kg', 'l', 'pcs']);
        $table->string('Product_Category');
        $table->string('Product_Sub_Category')->nullable();
        $table->integer('Category_id');
        $table->string('bar_code');
        $table->text('description');
        $table->string('price');
        $table->string('image_url');
        $table->string('ingredients');
        $table->integer('brand_id');
        $table->integer('country_id');
        $table->timestamps();

        $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
        $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
        $table->foreign('Category_id')->references('id')->on('categorys')->onDelete('cascade');
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
