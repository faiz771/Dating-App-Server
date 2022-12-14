<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddOnsServices extends Model
{
    use HasFactory;
    protected $fillable = [
        'services',
        'price',
        'status',
    ];
}
