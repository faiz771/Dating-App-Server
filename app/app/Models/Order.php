<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;
use App\Models\Package;
class Order extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'package_id',
        'amount',
        'payment_method',
        'proof',
        'transaction_id',
        'invoice_url',
        'order_id',
        'status',
        'service_type',
        'refund_desc',
        'coupon_id',
        'before_assign_coupon_amount',
    ];


    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function coupon()
    {
        return $this->belongsTo(DiscountCoupn::class,'coupon_id');
    }

    public function package()
    {
        return $this->belongsTo(Package::class,'package_id');
    }
}
