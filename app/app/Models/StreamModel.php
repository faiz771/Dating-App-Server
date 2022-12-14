<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StreamModel extends Model
{
    use HasFactory;
    protected $table='streams';

    protected $fillable=[
        'streamChannel','streamDetail','streamTitle','isLive','user_id'
    ];

    public function getUser(){
        return User::find($this->user_id);
    }
}
