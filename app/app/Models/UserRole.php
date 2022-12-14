<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;
use App\Models\Role;
class UserRole extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'user_id',
        'role_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function role()
    {
        return $this->belongsTo(Role::class,'role_id');
    }
}
