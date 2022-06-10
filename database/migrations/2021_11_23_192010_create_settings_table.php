<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {

            $table->id();
            $table->text('about_first_text');
            $table->text('about_second_text');
            $table->string('about_first_image');
            $table->string('about_second_image');
            $table->string('about_third_image');
            $table->string('banner_image_1'); 
            $table->string('banner_image_2');
            $table->string('banner_image_3');
            $table->string('banner_image_4');
            $table->string('sub_banner1');
            $table->string('sub_banner2');
            $table->text('about_our_vision');
            $table->text('about_our_mission');
            $table->text('about_services');
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
        Schema::dropIfExists('settings');
    }
}
