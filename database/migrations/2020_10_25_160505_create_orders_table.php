<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('number_order');
            $table->enum('status',['abierto','cerrado'])->default('abierto');
            $table->unsignedBigInteger('table_id')->nullable();
            $table->unsignedBigInteger('waiter_id')->nullable();
            $table->unsignedBigInteger('diner_id')->nullable();
            $table->unsignedBigInteger('type_order_id')->nullable();
            $table->timestamps();
            
            $table->foreign('table_id')->references('id')->on('tables');
            $table->foreign('waiter_id')->references('id')->on('users');
            $table->foreign('diner_id')->references('id')->on('users');
            $table->foreign('type_order_id')->references('id')->on('type_orders');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
