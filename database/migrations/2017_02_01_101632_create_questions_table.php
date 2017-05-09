<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id');
            $table->text('question');
            $table->text('question_en');
            $table->text('answer');
            $table->text('answer_en');
            $table->timestamps();
        });

        $question = new \App\Question;
        $question->question = 'Хямдралтай зочид буудуулыг яаж олох вэ?';
        $question->question_en = 'Хямдралтай зочид буудуулыг яаж олох вэ?';
        $question->answer = 'Манай цахим хуудас байрлаж буй зочид буудлуудын өрөөний үнэлгээ нь харьцангуй хямд байдаг бөгөөд Та манай цахим хуудас бүртгүүлснээр нэмэлт хямдрал урамшууллын мэдээллийг цаг алдалгүй авах боложтой юм.';
        $question->answer_en = 'Манай цахим хуудас байрлаж буй зочид буудлуудын өрөөний үнэлгээ нь харьцангуй хямд байдаг бөгөөд Та манай цахим хуудас бүртгүүлснээр нэмэлт хямдрал урамшууллын мэдээллийг цаг алдалгүй авах боложтой юм.';
        $question->save();

        $question = new \App\Question;
        $question->question = 'Зочид буудлын үнэнд нэмэгдсэн өртгийн албан татвар багтсан байдаг уу?';
        $question->question_en = 'Зочид буудлын үнэнд нэмэгдсэн өртгийн албан татвар багтсан байдаг уу?';
        $question->answer = 'iHotel.mn цахим хуудаст байрлаж буй зочид буудлуудын үнэнд нэмэгдсэн өртгийн татвар багтсан байдаг. Та өрөөний төлбөрийг хийх үед татварын мэдээллийг харах боломжтой юм.';
        $question->answer_en = 'iHotel.mn цахим хуудаст байрлаж буй зочид буудлуудын үнэнд нэмэгдсэн өртгийн татвар багтсан байдаг. Та өрөөний төлбөрийг хийх үед татварын мэдээллийг харах боломжтой юм.';
        $question->save();

        $question = new \App\Question;
        $question->question = 'Зочид буудлын төлбөрийг бэлнээр төлөх боломжтой юу?';
        $question->question_en = 'Зочид буудлын төлбөрийг бэлнээр төлөх боломжтой юу?';
        $question->answer = 'iHotel.mn цахим хуудас одоогоор зөвхөн онлайн хэлбэрээр болон дансаар төлбөр авч байна. Шаардлагатай тохиолдолд Та мэдээллийн ажилтантай холбогдож санал хүсэлт гаргаж болох юм.';
        $question->answer_en = 'iHotel.mn цахим хуудас одоогоор зөвхөн онлайн хэлбэрээр болон дансаар төлбөр авч байна. Шаардлагатай тохиолдолд Та мэдээллийн ажилтантай холбогдож санал хүсэлт гаргаж болох юм.';
        $question->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
    }
}
