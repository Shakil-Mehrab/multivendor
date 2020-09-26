<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('shop_id');
            $table->unsignedInteger('category_id');
            $table->unsignedInteger('discount_id')->nullable();
            $table->string('position')->nullable();
            $table->string('code');
            $table->string('brand');
            $table->string('name');
            $table->string('slug');
            $table->string('color');
            $table->integer('quantity');
            $table->integer('min_order');
            $table->float('weight');
            $table->string('image')->default('images/default.jpg');
            $table->float('price');
            $table->float('sale_price')->default(500);
            $table->boolean('status')->default(0);
            $table->boolean('featured')->default(0);
            $table->integer('view')->default('50');
            $table->integer('sale_count')->default('0');
            $table->string('rating')->default(5);
            $table->text('description');
            $table->timestamps();
            $table->foreign('shop_id')->references('id')->on('shops')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('discount_id')->references('id')->on('discounts')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
