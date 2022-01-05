<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DeleteCartTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('products_cart');
        Schema::dropIfExists('cart');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('cart', function (Blueprint $table) {
            $table->id();
        });

        Schema::create('products_cart', function (Blueprint $table) {
            $table->id();
        });
    }
}
