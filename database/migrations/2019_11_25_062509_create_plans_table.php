<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('client_entity')->unsigned();
            $table->integer('plan_price')->unsigned();
            $table->integer('no_of_picture_in_personal_gallery')->unsigned();
            
            $table->integer('no_of_picture_in_award')->unsigned();
            
            $table->integer('registration_validity');
            $table->integer('no_of_model_contact');
            $table->integer('no_of_photographer_contact');
            $table->integer('no_of_makeup_artist_contact');
            $table->integer('model_contact_addon_price');
            $table->integer('photographer_contact_addon_price');
            $table->integer('makeup_artist_contact_addon_price');
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
        Schema::dropIfExists('plans');
    }
}
