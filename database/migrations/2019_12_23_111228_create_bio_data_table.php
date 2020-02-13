<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBioDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bio_data', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('customer_id')->nullable();
            $table->string('first_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('dob')->nullable();
            $table->string('gender')->nullable();
            $table->string('address')->nullable();
            $table->string('contact_no_1')->nullable();
            $table->string('contact_no_2')->nullable();
            $table->string('email_address')->nullable();
            $table->string('weight')->nullable();
            $table->string('weight_unit')->nullable();
            $table->string('height')->nullable();
            $table->string('height_unit')->nullable();
            $table->string('hair_length')->nullable();
            $table->string('complexion')->nullable();
            $table->string('breast_size')->nullable();
            $table->string('breast_unit')->nullable();
            $table->string('waist')->nullable();
            $table->string('waist_unit')->nullable();
            $table->string('hips')->nullable();
            $table->string('hips_unit')->nullable();
            $table->string('body_pattern')->nullable();
            $table->string('tatto')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('skin_tone')->nullable();
            $table->string('shoe_size')->nullable();
            $table->string('show_size_unit')->nullable();
            $table->string('eye_color')->nullable();
            $table->string('hair_color')->nullable();
            $table->string('dress_comfortable')->nullable();
            $table->string('bridal_shoot')->nullable();
            $table->string('western_shoot')->nullable();
            $table->string('body_paint_shoot')->nullable();
            $table->string('designer_shoot')->nullable();
            $table->string('ethnic_wear')->nullable();
            $table->string('western_wear')->nullable();
            $table->string('bikini')->nullable();
            $table->string('lingeries')->nullable();
            $table->string('swim_suits')->nullable();
            $table->string('calender_shoot')->nullable();
            $table->string('video_shoot')->nullable();
            $table->string('nude')->nullable();
            $table->string('semi_nude')->nullable();
            $table->string('bridal')->nullable();
            $table->string('sharee')->nullable();
            $table->string('compromise')->nullable();
            $table->string('smoking')->nullable();
            $table->string('drinking')->nullable();
            $table->string('acting')->nullable();
            $table->string('music_album')->nullable();
            $table->string('short_film')->nullable();
            $table->string('secondary_education')->nullable();
            $table->string('higher_secondary_education')->nullable();
            $table->string('graduation')->nullable();
            $table->string('post_graduation')->nullable();
            $table->string('education_others')->nullable();
            $table->string('present_profession')->nullable();
            $table->string('working_experience')->nullable();
            $table->string('designation')->nullable();
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
        Schema::dropIfExists('bio_data');
    }
}
