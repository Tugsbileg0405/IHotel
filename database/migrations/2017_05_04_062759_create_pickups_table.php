<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePickupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pickups', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('name_en');
            $table->integer('price');
            $table->timestamps();
        });

        $pickup = new \App\Pickup;
        $pickup->name = 'SIXT';
        $pickup->name_en = 'SIXT';
        $pickup->price = 200000;
        $pickup->save();

        $pickup = new \App\Pickup;
        $pickup->name = 'Энгийн';
        $pickup->name_en = 'Энгийн';
        $pickup->price = 50000;
        $pickup->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pickups');
    }
}
