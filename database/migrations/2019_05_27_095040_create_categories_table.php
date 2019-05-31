<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Foundation\Testing\Constraints\SoftDeletedInDatabase;
use Illuminate\Database\Eloquent\SoftDeletes;

class CreateCategoriesTable extends Migration
{
    use SoftDeletes;
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string( 'name', 20 );
            $table->string( 'photo', 20 )->default('noimage.png');
            $table->mediumText('description')->nullable();
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
        Schema::dropIfExists('categories');
    }
}
