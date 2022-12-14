<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Draft extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'password',
        'gender',
        'dob',
        'phone',
        'address',
        'address2',
        'city',
        'state',
        'country',
        'postal_code',
        'company',
        'designer_id',
        'members',
        'ownership',

        'businesspurpose',
        'business_address',
        'have_business_ad',
        'cus_allow_sf_setBA',
        'allow_sharp_to_provide_bAdress',
        'are_you_us_citizen',
        'd_physical_business_bank_acc',
        'd_paypal_business_acc',
        'd_stripe_account_acc',
        'd_CapitalOne_account_acc',
        'put_u_r_ITIN_for_bank_and_paypal_acc',
        'put_u_r_SSN__for_bank_and_paypal_acc',
        'put_u_r__name_ITIN_passport_documents_acc',
        'put_u_r__address',
        'no_us_citizen_d_stripe_account_acc',
        'no_us_citizen_d_CapitalOne_account_acc',
        'i_m_foregin_individual_not_h_socialSocurity_num',
        'i_m_foregin_individual_yes_h_socialSocurity_num_full_name',
        'yes_socialSocurity_num_full_name',
        'no_socialSocurity_Us_citizen_iHAVE_ssn_or_itin',
        'no_socialSocurity_Us_citizen_ssn',
        'no_socialSocurity_Us_citizen_itin',
        'no_socialSocurity_Us_citizen_name_as_per_ssn_or_itin',
        'save_my_information_feture_purchase',

        'coupon_id',
        'before_coupon_apply_amount',
        'coupon_status',
        'package_fee',

    ];

    protected $casts = [
        'company' => 'array',
    ];
}
