<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee_exp extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'expense',
        'category',
        'status',
    ];


    public function user_role()
    {
        return $this->belongsTo(User::class,'user_id');
    }

}
