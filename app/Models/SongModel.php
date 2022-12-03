<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SongModel extends Model
{
    use HasFactory;
    protected $table='songs';

    protected $fillable=[
        'songTitle','songDetail','songUrl','songGenre','songConverPhoto',
        'songVideo','songSpotifyID','songDuration',
        'artist_id'
    ];

    public function getArtist(){
        return ArtistModel::find($this->artist_id);
    }
}
