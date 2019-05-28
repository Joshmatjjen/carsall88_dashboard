<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Eloquent\SoftDeletes;

class CreateCategoriesTypeTable extends Migration
{
    use SoftDeletes;
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories_type', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('categories_id')->unsigned();
            $table->foreign('categories_id' )
            ->references( 'id' )->on( 'categories' )
            ->onDelete( 'cascade' )
            ->onUpdate( 'cascade' );
            $table->string('name', 20);
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
        Schema::dropIfExists('categories_type');
    }
}
