<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNavigationTablesOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('navigation_tables_orders', function (Blueprint $table) {
            $table->bigIncrements('navigation_table_order_id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('navigation_table_id');
            $table->foreign('navigation_table_id')->references('navigation_table_id')->on('navigation_tables');
            $table->unsignedBigInteger('page_id');
            $table->foreign('page_id')->references('page_id')->on('pages');
            $table->integer('order');
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
        Schema::dropIfExists('navigation_tables_orders');
    }
}
