<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LikeModel extends Model
{
    use HasFactory;
    protected $table='likes';

    protected $fillable=[
        'likedBy','liked','reaction'
    ];

    public function likedBy(){
        return User::find($this->likedBy);
    }

    public function liked(){
        return User::find($this->liked);
    }
}
