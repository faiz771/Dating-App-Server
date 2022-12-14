<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $fillable = [
        'file',
        'desc',
        'user_id',
        'status',
    ];


    public function user_detail()
    {
        return $this->belongsTo(User::class,'user_id');
    }

}
