<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomServiceCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room_service_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('name_en');
            $table->timestamps();
        });

        $category = new \App\RoomServiceCategory;
        $category->name = "Өрөөний тохижилт";
        $category->name_en = "Өрөөний тохижилт";
        $category->save();

        $category = new \App\RoomServiceCategory;
        $category->name = "Нэмэлт үйлчилгээ";
        $category->name_en = "Extra services";
        $category->save();

        $category = new \App\RoomServiceCategory;
        $category->name = "Угаалгын өрөө";
        $category->name_en = "Bath room";
        $category->save();

        $category = new \App\RoomServiceCategory;
        $category->name = "Хоол ба уух зүйлс";
        $category->name_en = "Food & Drinks";
        $category->save();

        $category = new \App\RoomServiceCategory;
        $category->name = "Технологи";
        $category->name_en = "Technology";
        $category->save();

        $category = new \App\RoomServiceCategory;
        $category->name = "Гадна талбай ба үзэгдэх орчин";
        $category->name_en = "Гадна талбай ба үзэгдэх орчин";
        $category->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('room_service_categories');
    }
}
