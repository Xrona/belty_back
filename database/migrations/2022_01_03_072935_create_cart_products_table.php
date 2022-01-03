<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart_products', function (Blueprint $table) {
            $table->id();
            $table->integer('cart_id');
            $table->integer('product_id');
            $table->integer('count');
            $table->string('engraving');
            $table->smallInteger('is_gift');
            $table->integer('size_id');
            $table->integer('color_id');
            $table->timestamps();
            
            $table->foreign('cart_id')
                    ->references('id')
                    ->on('cart')
                    ->onDeelete('cascade')
                    ->onUpdate('cascade');

            $table->foreign('product_id')
                    ->references('id')
                    ->on('products')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

            $table->foreign('size_id')
                    ->references('id')
                    ->on('sizes')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');

            $table->foreign('color_id')
                    ->references('id')
                    ->on('colors')
                    ->onUpdate('cascade')
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
        Schema::dropIfExists('cart_products');
    }
}
