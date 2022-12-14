<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\UserRole;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'pkg_id',
        'name',
        'email',
        'password',
        'status',
        'approved',
        'phone',
        'country',
        'state',
        'city',
        'address',
        'address2',
        'postal_code',
        'gender',
        'image',
        'userType',
        'device_token',
        'avatar1',
        'decrypted_password',
        'company',
        'businesspurpose',
        'business_address',
        'have_business_ad',
        'cus_allow_sf_setBA',
        'designer_id',
        'dob',
        'fb_link',
        'insta_link',
        'twitter_link',
        'salary',
        'employee_id',

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
        'customer_id',
        'purchase_type',
        'coupon_id',
        'before_coupon_apply_amount',
        'coupon_status',
        'package_fee',
        'email_verifed',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function package_id(){
        return $this->belongsTo(Package::class , 'pkg_id');
    }

    public function designation_id(){
        return $this->belongsTo(Designer::class , 'designer_id');
    }

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'company' => 'array',
    ];

    public function User_id()
    {
        return $this->hasOne(Order::class,'user_id');
    }
    
}
