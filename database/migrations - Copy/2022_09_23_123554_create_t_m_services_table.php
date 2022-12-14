<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTMServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_m_services', function (Blueprint $table) {
            $table->id();
            $table->longText('fullName')->nullable();
            $table->longText('Email')->nullable();
            $table->longText('Phone')->nullable();
            $table->longText('Company_name')->nullable();
            $table->longText('entity_type')->nullable();
            $table->longText('state_of_formation')->nullable();
            $table->longText('date_of_formation')->nullable();
            $table->longText('designator')->nullable();
            $table->longText('com_address')->nullable();
            $table->longText('com_state')->nullable();
            $table->longText('com_zipcode')->nullable();
            $table->longText('com_city')->nullable();
            $table->longText('owner_info')->nullable();
            $table->longText('Please_enter_name_owns_mark')->nullable();
            $table->longText('owner_info_name')->nullable();
            $table->longText('owner_info_Street_Address')->nullable();
            $table->longText('owner_info_city')->nullable();
            $table->longText('owner_info_state')->nullable();
            $table->longText('owner_info_zipcode')->nullable();
            $table->longText('owner_info_phone')->nullable();
            $table->longText('owner_info_email')->nullable();
            $table->longText('owner_info_Website')->nullable();
            $table->longText('tm_info_appropriate_trademark')->nullable();
            $table->longText('tm_info_name')->nullable();
            $table->longText('tm_info_name_business')->nullable();
            $table->longText('tm_info_SLOGAN')->nullable();
            $table->longText('tm_info_SLOGAN_Slogan')->nullable();
            $table->longText('tm_info_LOGO')->nullable();
            $table->longText('tm_info_LOGO_logo')->nullable();
            $table->longText('list_products_services_offered_using_mark')->nullable();
            $table->longText('currently_using_the_mark')->nullable();
            $table->longText('Product_Images')->nullable();
            $table->longText('read_the_acknowledgement')->nullable();
            $table->longText('user_id')->nullable();
            $table->longText('tm_fee')->nullable();
            $table->longText('status')->nullable();
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
        Schema::dropIfExists('t_m_services');
    }
}
