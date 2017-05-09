<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('name_en');
            $table->timestamps();
        });

        $category = new \App\RoomCategory;
        $category->name = 'Single Bed - 1 хүний ортой';
        $category->name_en = 'Single Bed - 1 хүний ортой';
        $category->save();

        $category = new \App\RoomCategory;
        $category->name = 'Double Bed - 2 хүний 1 ортой';
        $category->name_en = 'Double Bed - 2 хүний 1 ортой';
        $category->save();

        $category = new \App\RoomCategory;
        $category->name = 'Twin Bed - 1 хүний 2 ортой';
        $category->name_en = 'Twin Bed - 1 хүний 2 ортой';
        $category->save();

        $category = new \App\RoomCategory;
        $category->name = 'Large Bed (King Size) - Өргөн ортой';
        $category->name_en = 'Large Bed (King Size) - Өргөн ортой';
        $category->save();

        $category = new \App\RoomCategory;
        $category->name = 'Bunk Bed - Давхар ортой';
        $category->name_en = 'Bunk Bed - Давхар ортой';
        $category->save();

        $category = new \App\RoomCategory;
        $category->name = 'Sofa Bed - Буйдан ортой';
        $category->name_en = 'Sofa Bed - Буйдан ортой';
        $category->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('room_categories');
    }
}
