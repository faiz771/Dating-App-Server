<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pkg_id')->nullable();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password')->nullable();
            $table->string('decrypted_password')->nullable();
            $table->string('company')->nullable();
            $table->unsignedBigInteger('designer_id')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('device_token')->nullable();
            $table->string('userType')->nullable();
            $table->string('avatar1')->nullable();
            $table->date('dob')->nullable();
            $table->bigInteger('phone')->nullable();
            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->longText('address')->nullable();
            $table->longText('address2')->nullable();
            $table->longText('businesspurpose')->nullable();
            $table->longText('cus_allow_sf_setBA')->nullable();
            $table->longText('have_business_ad')->nullable();
            $table->longText('business_address')->nullable();
            $table->bigInteger('postal_code')->nullable();
            $table->string('gender')->nullable();
            $table->integer('status')->nullable();
            $table->integer('approved')->nullable();
            $table->string('forming')->nullable();
            $table->string('f_state')->nullable();
            $table->json('members')->nullable();
            $table->json('ownerships')->nullable();
            $table->string('fb_link')->nullable();
            $table->string('insta_link')->nullable();
            $table->string('twitter_link')->nullable();
            $table->string('salary')->nullable();
            $table->string('employee_id')->nullable();
            $table->string('allow_sharp_to_provide_bAdress')->nullable();
            $table->string('are_you_us_citizen')->nullable();
            $table->string('d_physical_business_bank_acc')->nullable();
            $table->string('d_paypal_business_acc')->nullable();
            $table->string('d_stripe_account_acc')->nullable();
            $table->string('d_CapitalOne_account_acc')->nullable();
            $table->string('put_u_r_ITIN_for_bank_and_paypal_acc')->nullable();
            $table->string('put_u_r_SSN__for_bank_and_paypal_acc')->nullable();
            $table->string('put_u_r__name_SSN_or_ITIN_passport_documents_acc')->nullable();
            $table->string('put_u_r__address')->nullable();
            $table->string('no_us_citizen_d_stripe_account_acc')->nullable();
            $table->string('no_us_citizen_d_CapitalOne_account_acc')->nullable();
            $table->string('i_m_foregin_individual_not_h_socialSocurity_num')->nullable();
            $table->string('i_m_foregin_individual_yes_h_socialSocurity_num_full_name')->nullable();
            $table->string('yes_socialSocurity_num_full_name')->nullable();
            $table->string('no_socialSocurity_Us_citizen_iHAVE_ssn_or_itin')->nullable();
            $table->string('no_socialSocurity_Us_citizen_ssn')->nullable();
            $table->string('no_socialSocurity_Us_citizen_itin')->nullable();
            $table->string('no_socialSocurity_Us_citizen_name_as_per_ssn_or_itin')->nullable();
            $table->string('save_my_information_feture_purchase')->nullable();
            $table->string('customer_id')->nullable();
            $table->string('purchase_type')->nullable();
            $table->string('coupon_id')->nullable();
            $table->string('coupon_status')->nullable();
            $table->string('before_coupon_apply_amount')->nullable();
            $table->string('email_verifed')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
