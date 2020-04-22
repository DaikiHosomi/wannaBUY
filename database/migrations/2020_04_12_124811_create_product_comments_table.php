<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_comments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->BigInteger('user_id')->unsigned();;
            $table->BigInteger('buyer_id')->unsigned();;
            $table->text('comment');
            $table->timestamps();

            
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->foreign('buyer_id')
                ->references('id')
                ->on('buyers')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_comments');
    }
}
