<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDraftsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drafts', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('visit_id')->nullable();
            $table->string('forming')->nullable();
            $table->string('f_state')->nullable();
            $table->string('email')->nullable();
            $table->string('password')->nullable();
            $table->string('gender')->nullable();
            $table->string('dob')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('address2')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('company')->nullable();
            $table->string('designer_id')->nullable();
            $table->longText('members')->nullable();
            $table->longText('ownership')->nullable();

            $table->string('businesspurpose')->nullable();
            $table->string('business_address')->nullable();
            $table->string('have_business_ad')->nullable();
            $table->string('cus_allow_sf_setBA')->nullable();
            $table->string('allow_sharp_to_provide_bAdress')->nullable();
            $table->string('are_you_us_citizen')->nullable();
            $table->string('d_physical_business_bank_acc')->nullable();
            $table->string('d_paypal_business_acc')->nullable();
            $table->string('d_stripe_account_acc')->nullable();
            $table->string('d_CapitalOne_account_acc')->nullable();
            $table->string('put_u_r_ITIN_for_bank_and_paypal_acc')->nullable();
            $table->string('put_u_r_SSN__for_bank_and_paypal_acc')->nullable();
            $table->string('put_u_r__name_ITIN_passport_documents_acc')->nullable();
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

            $table->string('coupon_id')->nullable();
            $table->string('before_coupon_apply_amount')->nullable();
            $table->string('coupon_status')->nullable();
            $table->string('package_fee')->nullable();

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
        Schema::dropIfExists('drafts');
    }
}
