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
        Schema::enableForeignKeyConstraints();
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')
            ->onDelete( 'cascade' )
            ->onUpdate( 'cascade' );
            $table->bigInteger('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories')
            ->onDelete( 'cascade' )
            ->onUpdate( 'cascade' );
            $table->bigInteger('sub_category_id')->unsigned();
            $table->foreign('sub_category_id')->references('id')->on('sub_categories')
            ->onDelete( 'cascade' )
            ->onUpdate( 'cascade' );
            $table->bigInteger('brand_id')->unsigned();
            $table->foreign('brand_id')->references('id')->on('brands')
            ->onDelete( 'cascade' )
            ->onUpdate( 'cascade' );
            $table->string('name');
            $table->bigInteger('price');
            $table->string('model')->nullable();
            $table->string('colour')->nullable();
            $table->string('transmission')->nullable();
            $table->string('fuel_type')->nullable();
            $table->Integer('year')->nullable();
            $table->string('condition')->nullable();
            $table->string('size')->nullable();
            $table->string('email');
            $table->string('address');
            $table->mediumText('description')->nullable();
            $table->string('photo1')->default('product-placeholder.jpg');
            $table->string('photo2')->default('product-placeholder.jpg');
            $table->string('photo3')->default('product-placeholder.jpg');
            $table->string('photo4')->default('product-placeholder.jpg');
            $table->timestamps();
            $table->softDeletes();
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
