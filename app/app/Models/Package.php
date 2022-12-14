<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \Staudenmeir\EloquentJsonRelations\HasJsonRelationships;
class Package extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'service_ids',
        'AddonServices',
        'Addonprice',
        'complementary',
        'name',
        'price',
        'type',
        'description',
        'discount',
        'image'
    ];

    protected $casts = [
        'service_ids' => 'json',
        'AddonServices' => 'array',
        'Addonprice' => 'array',
        'complementary' => 'array',
    ];

    public function services()
    {
        return $this->belongsToJson('App\Models\PackageService', 'service_ids');
    }

    public function Add_onservices()
    {
        return $this->belongsTo('App\Models\AddOnsServices', 'AddonServices');
    }

    public function order()
    {
        return $this->hasOne(Order::class,'package_id');
    }
}
