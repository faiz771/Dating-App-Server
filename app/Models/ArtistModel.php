<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArtistModel extends Model
{
    use HasFactory;
    protected $table='artists';

    protected $fillable=[
        'artist','artistPhoto','artistSpotifyID'
    ];

    public function getSongs(){
        return SongModel::where('artist_id',$this->id)->get();
    }

}
