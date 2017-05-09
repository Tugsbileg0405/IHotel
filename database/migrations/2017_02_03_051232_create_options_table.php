<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('options', function (Blueprint $table) {
            $table->increments('id');
            $table->text('value');
            $table->text('value_en')->nullable()->default(null);
            $table->timestamps();
        });

        $option = new \App\Option;
        $option->value = 'Бид зочид буудлын захиалгын түнш, аялагч жуулчдын дотны зөвлөгч, тэдгээрийг технологиор холбогч гүүр байна.';
        $option->value_en = 'Бид зочид буудлын захиалгын түнш, аялагч жуулчдын дотны зөвлөгч, тэдгээрийг технологиор холбогч гүүр байна.';
        $option->save();

        $option = new \App\Option;
        $option->value = 'iHotel.mn нь аялагчид Монголын 500 гаруй, дэлхийн сая илүү зочид буудал, амралтын газрыг хамгийн хурдан, хялбар, нэмэлт төлбөр, шимтгэлгүйгээр эх хэл дээрээ, найдвартай захиалах боломжтой онлайн зөвлөгч юм. Бид олон улсын нэр хүнд бүхий booking.com, agoda.com, airbnb, ctrip гэх мэт онлайн захиалгын системүүдийн албан ёсны түнш бөгөөд өөрийн 3 жилийн туршлага дээрээ үндэслэн танд хамгийн хямд, тав тухтай, байрлал сайтай, хэрэгцээ шаардлагад тань төгс тохирох сонголтуудыг ямагт санал болгоно. Та эх хэл дээрээ сонголтоо хийж, аяллын зөвлөгөөг үнэгүй авснаар учирч болох олон эрсдэлээс сэргийлж илүү хямд зардал, бага энергиэр аялах боломжтой.';
        $option->value_en = 'iHotel.mn нь аялагчид Монголын 500 гаруй, дэлхийн сая илүү зочид буудал, амралтын газрыг хамгийн хурдан, хялбар, нэмэлт төлбөр, шимтгэлгүйгээр эх хэл дээрээ, найдвартай захиалах боломжтой онлайн зөвлөгч юм. Бид олон улсын нэр хүнд бүхий booking.com, agoda.com, airbnb, ctrip гэх мэт онлайн захиалгын системүүдийн албан ёсны түнш бөгөөд өөрийн 3 жилийн туршлага дээрээ үндэслэн танд хамгийн хямд, тав тухтай, байрлал сайтай, хэрэгцээ шаардлагад тань төгс тохирох сонголтуудыг ямагт санал болгоно. Та эх хэл дээрээ сонголтоо хийж, аяллын зөвлөгөөг үнэгүй авснаар учирч болох олон эрсдэлээс сэргийлж илүү хямд зардал, бага энергиэр аялах боломжтой.';
        $option->save();

        $option = new \App\Option;
        $option->value = 'Айхотел ХХК Мэдээллийн Технологийн Үндэсний Парк 206 тоот, Сүхбаатар дүүрэг, Бага Тойруу-49, Улаанбаатар-210646 Монгол улс';
        $option->value_en = 'Айхотел ХХК Мэдээллийн Технологийн Үндэсний Парк 206 тоот, Сүхбаатар дүүрэг, Бага Тойруу-49, Улаанбаатар-210646 Монгол улс';
        $option->save();

        $option = new \App\Option;
        $option->value = '+976-88021087';
        $option->value_en = '+976-88021087';
        $option->save();

        $option = new \App\Option;
        $option->value = 'info@ihotel.mn';
        $option->value_en = 'info@ihotel.mn';
        $option->save();

        $option = new \App\Option;
        $option->value = '["47.92161969079989","106.92236244678497"]';
        $option->value_en = '["47.92161969079989","106.92236244678497"]';
        $option->save();

        $option = new \App\Option;
        $option->value = '2400';
        $option->value_en = '2400';
        $option->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('options');
    }
}
