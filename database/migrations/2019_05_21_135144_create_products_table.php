<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->string('name');
            $table->decimal('price');
            $table->string('size')->nullable();
            $table->string('category')->default('car_parts');
            $table->string('category_type');
            $table->string('email');
            $table->string('address');
            $table->mediumText('description')->nullable();
            $table->string('photo_main')->default('product-placeholder.jpg');
            $table->string('photo_second')->default('product-placeholder.jpg');
            $table->string('photo_last')->default('product-placeholder.jpg');

            $table->timestamps();
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
