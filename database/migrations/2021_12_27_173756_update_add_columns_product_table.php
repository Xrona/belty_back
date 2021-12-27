<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateAddColumnsProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function(Blueprint $table) {
            $table->integer('width')->default(0);
            $table->integer('guarantee')->default(30);
            $table->integer('bestseller')->default(0);
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
            $table->dropColumn('width');
            $table->dropColumn('guarantee');
            $table->dropColumn('bestseller');
        });
    }
}
