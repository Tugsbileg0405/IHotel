<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHotelServiceCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotel_service_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('name_en');
            $table->timestamps();
        });

        $category = new \App\HotelServiceCategory;
        $category->name = "Ажилчдын ярьж чадах гадаад хэлнүүд";
        $category->name_en = "Ажилчдын ярьж чадах гадаад хэлнүүд";
        $category->save();

        $category = new \App\HotelServiceCategory;
        $category->name = "Зочид буудлаас санал болгодог үйл ажиллагаанууд";
        $category->name_en = "Зочид буудлаас санал болгодог үйл ажиллагаанууд";
        $category->save();

        $category = new \App\HotelServiceCategory;
        $category->name = "Чөлөөт цаг өнгөрөөх болон гэр бүлийн үйлчилгээ";
        $category->name_en = "Чөлөөт цаг өнгөрөөх болон гэр бүлийн үйлчилгээ";
        $category->save();

        $category = new \App\HotelServiceCategory;
        $category->name = "Хоол ба уух зүйлс";
        $category->name_en = "Хоол ба уух зүйлс";
        $category->save();

        $category = new \App\HotelServiceCategory;
        $category->name = "Тээвэрлэлт";
        $category->name_en = "Тээвэрлэлт";
        $category->save();

        $category = new \App\HotelServiceCategory;
        $category->name = "Нийтэд зориулсан хэсэг";
        $category->name_en = "Нийтэд зориулсан хэсэг";
        $category->save();

        $category = new \App\HotelServiceCategory;
        $category->name = "Угаалгын үйлчилгээ";
        $category->name_en = "Угаалгын үйлчилгээ";
        $category->save();

        $category = new \App\HotelServiceCategory;
        $category->name = "Эрүүлжүүлж, алжаал тайлах төв";
        $category->name_en = "Эрүүлжүүлж, алжаал тайлах төв";
        $category->save();

        $category = new \App\HotelServiceCategory;
        $category->name = "Хүлээн авах үйлчилгээ";
        $category->name_en = "Хүлээн авах үйлчилгээ";
        $category->save();

        $category = new \App\HotelServiceCategory;
        $category->name = "Бизнесийн үйлчилгээ";
        $category->name_en = "Бизнесийн үйлчилгээ";
        $category->save();

        $category = new \App\HotelServiceCategory;
        $category->name = "Үйлчилгээний төв";
        $category->name_en = "Үйлчилгээний төв";
        $category->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hotel_service_categories');
    }
}
