<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHotelCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotel_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('name_en');
            $table->timestamps();
        });

        $category = new \App\HotelCategory;
        $category->name = 'Зочид буудал';
        $category->name_en = 'Hotel';
        $category->save();

        $category = new \App\HotelCategory;
        $category->name = 'Гэст хаус';
        $category->name_en = 'Guest house';
        $category->save();

        $category = new \App\HotelCategory;
        $category->name = 'Амралтын газар';
        $category->name_en = 'Camp';
        $category->save();

        $category = new \App\HotelCategory;
        $category->name = 'Рашаан сувилал';
        $category->name_en = 'Spa resort';
        $category->save();

        $category = new \App\HotelCategory;
        $category->name = 'Жуулчны бааз';
        $category->name_en = 'Tourist camp';
        $category->save();

        $category = new \App\HotelCategory;
        $category->name = 'Айл';
        $category->name_en = 'House';
        $category->save();

        $category = new \App\HotelCategory;
        $category->name = 'Бусад';
        $category->name_en = 'Other';
        $category->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hotel_categories');
    }
}
