<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('number')->nullable()->default(null);
            $table->integer('user_id')->nullable()->default(null);
            $table->integer('hotel_id');
            $table->string('hotel_name');
            $table->text('rooms');
            $table->integer('day');
            $table->date('startdate');
            $table->date('enddate');
            $table->text('pickup')->nullable()->default(null);
            $table->integer('price')->nullable()->default(null);
            $table->float('price_dollar')->nullable()->default(null);
            $table->float('dollar_rate')->nullable()->default(null);
            $table->text('carddata');
            $table->text('userdata');
            $table->text('flightdata')->nullable()->default(null);
            $table->text('request')->nullable()->default(null);
            $table->integer('status')->default(1);
            $table->string('token')->nullable()->default(null);
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
        Schema::dropIfExists('orders');
    }
}
