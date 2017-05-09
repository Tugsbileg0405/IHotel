<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('name_en');
            $table->timestamps();
        });

        $category = new \App\PostCategory;
        $category->name = 'Зөвлөгөө';
        $category->name_en = 'Advise';
        $category->save();

        $category = new \App\PostCategory;
        $category->name = 'Мэдээ, мэдээлэл';
        $category->name_en = 'News';
        $category->save();

        $category = new \App\PostCategory;
        $category->name = 'Улс орнууд';
        $category->name_en = 'Countries';
        $category->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_categories');
    }
}
