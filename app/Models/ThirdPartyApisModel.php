<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThirdPartyApisModel extends Model
{
    use HasFactory;
    protected $table='third_party_apis';

    protected $fillable=[
        'apiVendor','mode','appID','token',
        'seceratID','urlScheme'
    ];

}
