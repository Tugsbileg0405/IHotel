<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('hotel_id');
            $table->integer('room_category_id');
            $table->string('name');
            $table->integer('number');
            $table->integer('bed_number');
            $table->integer('people_number');
            $table->integer('price');
            $table->integer('price_op')->nullable()->default(null);
            $table->integer('total_people')->nullable()->default(null);
            $table->integer('size')->nullable()->default(null);
            $table->text('introduction')->nullable()->default(null);
            $table->text('introduction_en')->nullable()->default(null);
            $table->text('photos')->nullable()->default(null);
            $table->string('key')->nullable()->default(null);
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
        Schema::dropIfExists('rooms');
    }
}
