<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('book_id')->unsigned();
            $table->integer('order_id')->unsigned();
            $table->integer('qty')->unsigned();
            $table->integer('total_price')->unsigned();
            $table->timestamps();

            $table->foreign('book_id')->references('id')->on('books')
                ->onUpdate('cascade');
            $table->foreign('order_id')->references('id')->on('orders')
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
        Schema::dropIfExists('items');
    }
}
