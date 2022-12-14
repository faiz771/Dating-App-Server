<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TasteModel extends Model
{
    use HasFactory;
    protected $table='taste';

    protected $fillable=[
        'song_id','artist_id',
        'user_id','frequency','songLiked'
    ];



    public function getUser(){
        return User::find($this->user_id);
    }
    public function getSong(){
        return SongModel::find($this->song_id);
    }
    public function getArtist(){
        return ArtistModel::find($this->artist_id);
    }
}
