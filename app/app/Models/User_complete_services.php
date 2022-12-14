<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_complete_services extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'services',
        'desc',
        'status',
        'user_id'
    ];


    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function service_name()
    {
        return $this->belongsTo(PackageService::class,'services');
    }


}
