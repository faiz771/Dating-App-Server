<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \Staudenmeir\EloquentJsonRelations\HasJsonRelationships;

class PackageService extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'name',
        'description'
    ];

    public function packages()
    {
        return $this->hasManyJson('App\Models\Package', 'service_ids');
    }
}
