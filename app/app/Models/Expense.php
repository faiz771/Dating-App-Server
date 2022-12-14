<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Package;
class Expense extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'pkg_id',
        'purchase',
        'expense',
        'user_id',
        'desc',
        'service_type'
    ];


    public function package()
    {
        return $this->belongsTo(Package::class,'pkg_id');
    }
}
