<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDrinkFoodOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drink_food_orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('drink_food_id');
            $table->unsignedBigInteger('order_id');
            $table->double('price');
            $table->integer('quantity');
            $table->integer('diner_number')->nullable();
            $table->enum('status',['pendiente','servido'])->default('pendiente');
            $table->string('details')->nullable();
            $table->timestamps();
            $table->foreign('drink_food_id')->references('id')->on('drink_food');
            $table->foreign('order_id')->references('id')->on('orders');
            

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('drink_food_orders');
    }
}
