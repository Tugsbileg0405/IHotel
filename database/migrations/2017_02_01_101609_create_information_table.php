<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('information', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('title_en');
            $table->string('subtitle');
            $table->string('subtitle_en');
            $table->text('content')->nullable()->default(null);
            $table->text('content_en')->nullable()->default(null);
            $table->string('image');
            $table->timestamps();
        });

        $information = new \App\Information;
        $information->title = 'Хялбар найдвартай';
        $information->title_en = 'Хялбар найдвартай';
        $information->subtitle = 'Илүү хялбар бас найдвартай';
        $information->subtitle_en = 'Илүү хялбар бас найдвартай';
        $information->content = '<p>Бид үйлчлүүлэгчдийн <strong>ТУРШЛАГА</strong> дээр үндэслэн таны хэрэгцээнд төгс зохицох зочид буудлыг дэлхийн <strong>САЯ</strong> гаруй зочид буудлаас шүүж танд санал болгоно. Та эх хэл дээрээ сонголтоо хийж, аяллын зөвөлгөөг авсанаар учирч болох олон <strong>ЭРСДЛЭЭС</strong> сэргийлэх боломжтой.</p>';
        $information->content_en = '<p>Бид үйлчлүүлэгчдийн <strong>ТУРШЛАГА</strong> дээр үндэслэн таны хэрэгцээнд төгс зохицох зочид буудлыг дэлхийн <strong>САЯ</strong> гаруй зочид буудлаас шүүж танд санал болгоно. Та эх хэл дээрээ сонголтоо хийж, аяллын зөвөлгөөг авсанаар учирч болох олон <strong>ЭРСДЛЭЭС</strong> сэргийлэх боломжтой.</p>';
        $information->image = 'img/uploads/informations/1.png';
        $information->save();

        $information = new \App\Information;
        $information->title = 'Мэргэжлийн баг';
        $information->title_en = 'Мэргэжлийн баг';
        $information->subtitle = 'Мэргэжлийн баг таны өмнөөс сонгож өгнө';
        $information->subtitle_en = 'Мэргэжлийн баг таны өмнөөс сонгож өгнө';
        $information->content = '<p><strong>3 ЖИЛИЙН</strong> туршлагатай зөвлөх баг тантай буудлаа захиалахаас эхлээд буудалаасаа гарах хүртэл хамт байх болно. Таны <strong>ЦАГ</strong> болон энергийг хэмнэнэ. Бид тухайн зочид буудлаас гэрээний дагуу хувь авах замаар орлого олдог учраас танаас ямар нэгэн <strong>НЭМЭЛТ ТӨЛБӨР ШИМТГЭЛ АВАХГҮЙ,</strong> үнэ төлбөргүй үйлчилгээ юм.</p>';
        $information->image = 'img/uploads/informations/2.png';
        $information->content_en = '<p><strong>3 ЖИЛИЙН</strong> туршлагатай зөвлөх баг тантай буудлаа захиалахаас эхлээд буудалаасаа гарах хүртэл хамт байх болно. Таны <strong>ЦАГ</strong> болон энергийг хэмнэнэ. Бид тухайн зочид буудлаас гэрээний дагуу хувь авах замаар орлого олдог учраас танаас ямар нэгэн <strong>НЭМЭЛТ ТӨЛБӨР ШИМТГЭЛ АВАХГҮЙ,</strong> үнэ төлбөргүй үйлчилгээ юм.</p>';
        $information->image = 'img/uploads/informations/2.png';
        $information->save();

        $information = new \App\Information;
        $information->title = 'Нэмэлт төлбөргүй';
        $information->title_en = 'Нэмэлт төлбөргүй';
        $information->subtitle = 'Нэмэлт төлбөр, хураамжгүй';
        $information->subtitle_en = 'Нэмэлт төлбөр, хураамжгүй';
        $information->content = '<p>Бид тухайн зочид буудлаас гэрээний дагуу хувь авах замаар орлого олдог учраас танаас ямар нэгэн <strong>НЭМЭЛТ ТӨЛБӨР ШИМТГЭЛ АВАХГҮЙ,</strong> үнэ төлбөргүй үйлчилгээ юм.</p>';
        $information->content_en = '<p>Бид тухайн зочид буудлаас гэрээний дагуу хувь авах замаар орлого олдог учраас танаас ямар нэгэн <strong>НЭМЭЛТ ТӨЛБӨР ШИМТГЭЛ АВАХГҮЙ,</strong> үнэ төлбөргүй үйлчилгээ юм.</p>';
        $information->image = 'img/uploads/informations/3.png';
        $information->save();

        $information = new \App\Information;
        $information->title = 'Очихдоо төл';
        $information->title_en = 'Очихдоо төл';
        $information->subtitle = 'Очихдоо төлбөрөө төл';
        $information->subtitle_en = 'Очихдоо төлбөрөө төл';
        $information->content = '<p>Буудал захиалах үед танаас ямар нэгэн <strong>ТӨЛБӨР ХУРААМЖ, УРЬДЧИЛГАА АВАХГҮЙ,</strong> та буудлын төлбөрөө очихдоо ресепшн дээр төлөх боломжтой.</p>';
        $information->content_en = '<p>Буудал захиалах үед танаас ямар нэгэн <strong>ТӨЛБӨР ХУРААМЖ, УРЬДЧИЛГАА АВАХГҮЙ,</strong> та буудлын төлбөрөө очихдоо ресепшн дээр төлөх боломжтой.</p>';
        $information->image = 'img/uploads/informations/4.png';
        $information->save();

        $information = new \App\Information;
        $information->title = 'Өргөн сонголт';
        $information->title_en = 'Өргөн сонголт';
        $information->subtitle = 'Илүү хялбар бас найдвартай';
        $information->subtitle_en = 'Илүү хялбар бас найдвартай';
        $information->content = '<p><strong>АЙХОТЕЛ ХХК</strong> нь олон улсын зочид буудал захиалгын номер нэг вэб сайт болох <strong>BOOKING.COM</strong> сайтын албан ёсны түнш бөгөөд тус сайтын <strong>1 САЯ ГАРУЙ ЗОЧИД БУУДЛЫГ</strong> танд санал болгож байна. Таны хүссэн байрлалд, чанартай үйлчилгээтэй, тав тухтай буудлуудаас <strong>ХЯМДРАЛ ЗАРЛАСАН БУУДЛУУДЫГ</strong> тухай бүр олж санал болгох боломжтой.</p>';
        $information->content_en = '<p><strong>АЙХОТЕЛ ХХК</strong> нь олон улсын зочид буудал захиалгын номер нэг вэб сайт болох <strong>BOOKING.COM</strong> сайтын албан ёсны түнш бөгөөд тус сайтын <strong>1 САЯ ГАРУЙ ЗОЧИД БУУДЛЫГ</strong> танд санал болгож байна. Таны хүссэн байрлалд, чанартай үйлчилгээтэй, тав тухтай буудлуудаас <strong>ХЯМДРАЛ ЗАРЛАСАН БУУДЛУУДЫГ</strong> тухай бүр олж санал болгох боломжтой.</p>';
        $information->image = 'img/uploads/informations/5.png';
        $information->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('information');
    }
}
