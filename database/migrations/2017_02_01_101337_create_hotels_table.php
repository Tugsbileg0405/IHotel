<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Intervention\Image\Facades\Image;

class CreateHotelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotels', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('category_id');
            $table->string('name');
            $table->string('name_en')->nullable()->default(null);
            $table->integer('star');
            $table->integer('room_number');
            $table->string('website')->nullable()->default(null);
            $table->string('contact');
            $table->string('contact_en')->nullable()->default(null);
            $table->string('phone_number');
            $table->string('email');
            $table->text('address');
            $table->text('address_en')->nullable()->default(null);
            $table->text('introduction')->nullable()->default(null);
            $table->text('introduction_en')->nullable()->default(null);
            $table->boolean('is_child')->nullable()->default(null);
            $table->integer('is_internet')->nullable()->default(null);
            $table->string('cover_photo')->nullable()->default(null);
            $table->text('other_photos')->nullable()->default(null);
            $table->text('other_service')->nullable()->default(null);
            $table->text('other_service_en')->nullable()->default(null);
            $table->text('other_info')->nullable()->default(null);
            $table->text('other_info_en')->nullable()->default(null);
            $table->text('payment')->nullable()->default(null);
            $table->integer('co_day')->nullable()->default(null);
            $table->string('co_payment')->nullable()->default(null);
            $table->boolean('sale')->default(false);
            $table->text('location');
            $table->string('what3words')->nullable()->default(null);
            $table->string('what3words_en')->nullable()->default(null);
            $table->boolean('published')->default(false);
            $table->boolean('is_active')->default(true);
            $table->float('rating')->default(0);
            $table->integer('total_people')->nullable()->default(0);
            $table->integer('priority')->default(1);
            $table->integer('step');
            $table->string('key')->nullable()->default(null);
            $table->timestamps();
        });

        Schema::create('favorites', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->index();
            $table->integer('hotel_id')->index();
            $table->unique(['user_id', 'hotel_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hotels');
        Schema::dropIfExists('favorites');
    }
}
