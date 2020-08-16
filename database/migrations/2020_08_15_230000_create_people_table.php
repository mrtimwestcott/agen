<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people', function (Blueprint $table) {
            $table->id();
            $table->foreignID('state_id')->references('id')->on('states');
            $table->foreignID('locality_id')->references('id')->on('localities');
            $table->foreignId('care_type_id')->references('id')->on('care_types');
            $table->foreignId('age_group_id')->references('id')->on('age_groups');
            $table->foreignId('sex_id')->references('id')->on('sexes');
            $table->foreignId('indigenous_status_id')->references('id')->on('indigenous_statuses');
            $table->foreignId('language_id')->references('id')->on('languages');
            $table->foreignId('country_of_birth_id')->references('id')->on('country_of_births');
            $table->foreignId('a_d_l_id')->references('id')->on('a_d_l_s');
            $table->foreignId('b_e_h_id')->references('id')->on('b_e_h_s');
            $table->foreignId('c_h_c_id')->references('id')->on('c_h_c_s');
            $table->foreignId('dementia_status_id')->references('id')->on('dementia_statuses');
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
        Schema::dropIfExists('people');
    }
}
