<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEinServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ein__services', function (Blueprint $table) {
            $table->id();
            $table->longText('ein_fee')->nullable();
            $table->longText('fullName')->nullable();
            $table->longText('Email')->nullable();
            $table->longText('Phone')->nullable();
            $table->longText('Company_name')->nullable();
            $table->longText('entity_type')->nullable();
            $table->longText('state_of_formation')->nullable();
            $table->longText('designator')->nullable();
            $table->longText('date_of_formation')->nullable();
            $table->longText('members')->nullable();
            $table->longText('street_address')->nullable();
            $table->longText('city')->nullable();
            $table->longText('state')->nullable();
            $table->longText('zip_code')->nullable();
            $table->longText('ss4_question_fname')->nullable();
            $table->longText('ss4_question_lname')->nullable();
            $table->longText('i_am_foregin_citizen_and_do_not_have_SSN')->nullable();
            $table->longText('Identification_number_obtain_EIN')->nullable();
            $table->longText('ssn_itin_number_enter')->nullable();
            $table->longText('provide_SSN_ITIN_holder_Address_street_address')->nullable();
            $table->longText('provide_SSN_ITIN_holder_Address_city')->nullable();
            $table->longText('provide_SSN_ITIN_holder_Address_state')->nullable();
            $table->longText('provide_SSN_ITIN_holder_Address_Zipcode')->nullable();
            $table->string('status')->nullable();
            $table->string('user_id')->nullable();
            $table->string('coupon_id')->nullable();
            $table->string('coupon_status')->nullable();
            $table->string('before_coupon_apply_amount')->nullable();
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
        Schema::dropIfExists('ein__services');
    }
}
