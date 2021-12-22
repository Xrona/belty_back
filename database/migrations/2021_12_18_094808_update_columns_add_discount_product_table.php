<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateColumnsAddDiscountProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function(Blueprint $table) {
            $table->integer('discount_id')->nullable();
            $table->smallInteger('enable_discount')->default(0);

            $table->foreign('discount_id')
                ->references('id')
                ->on('discounts')
                ->onDelete('set null')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products' , function (Blueprint $table) {
            $table->dropForeign('products_discount_id_foreign');

            $table->dropColumn('discount_id');
            $table->dropColumn('enable_discount');
        });
    }
}
