<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room_services', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('service_category_id');
            $table->string('name');
            $table->string('name_en');
            $table->timestamps();
        });

        Schema::create('room_room_service', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('room_id')->index();
            $table->integer('room_service_id')->index();
            $table->unique(['room_id', 'room_service_id']);
            $table->timestamps();
        });

        $array = [["Хувцас өлгүүр","Агааржуулагч","2 метр ба түүнээс дээш урттай нэмэлт ор","Задгай зуух","Индүү","Индүүний тавиур","Халуун ванн","Аюулгүй байдал хангамжийн хайрцаг","Дуу тусгаардагч","Паркетан шал"],["Cэрүүлэг","Утсаар сэрээх үйлчилгээ","Цагаан хэрэглэл","Нүүр гарын алчуур"],["Ванн","Шүршүүр","Алчуур","Үнэгүй ариун цэврийн хэрэгсэл","Нэмэлт нойл","Үсний сэнс","Халуун рашаан","Нийтийн ариун цэврийн өрөө","Нийтийн нойл","Саун","Гэрийн шаахай","Нэмэлт угаалгын өрөө"],["Хооллох талбай","Өглөөний цай","Талх шарагч"],["Компьютер","Game console-Nintendo Wifi","Game Console-PS2","Game Console-PS3","Game Console-Xbox 360","Зөөврийн компьютер","iPad"],["Тагт","Үзэгдэх орчин","Дэнж","Хотыг харах байрлал","Түүхэн дурсгалт газруудыг харах байрлал","Байгаль харагдах байрлал"]];

        foreach ($array as $key => $arraySet) {
            foreach ($arraySet as $item) {
                $service = new \App\RoomService;
                $service->service_category_id = $key + 1;
                $service->name = $item;
                $service->name_en = $item;
                $service->save();
            }
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('room_services');
        Schema::dropIfExists('room_room_service');
    }
}
