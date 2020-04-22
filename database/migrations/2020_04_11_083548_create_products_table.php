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
            $table->BigInteger('user_id')->unsigned();
            $table->string('product_name');
            $table->text('introduction');
            $table->integer('price');
            $table->unsignedInteger('sold')->nullable();
            $table->string('class_name')->nullable();
            
            $table->BigInteger('product_category_id')->unsigned();
            $table->BigInteger('product_condition_id')->unsigned();
            $table->BigInteger('transaction_way_id')->unsigned();
            $table->timestamp('published_at');
            
        

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('product_category_id')
                ->references('id')
                ->on('product_categories')
                ->onDelete('cascade');

            $table->foreign('product_condition_id')
                ->references('id')
                ->on('product_conditions')
                ->onDelete('cascade');

            $table->foreign('transaction_way_id')
                ->references('id')
                ->on('transaction_ways')
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
        Schema::dropIfExists('products');
    }
}
