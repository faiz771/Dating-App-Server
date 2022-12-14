<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Role;
use App\Models\Permission;
class RolePermission extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'role_id',
        'permission_id'
    ];

    public function role()
    {
        return $this->belongsTo(Role::class,'role_id');
    }

    public function permission()
    {
        return $this->belongsTo(Permission::class,'permission_id');
    }
}
