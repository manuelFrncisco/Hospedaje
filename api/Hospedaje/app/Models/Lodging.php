<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lodging extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "description",
        "image",
        "package_id",
        "backroom",
        "ofert_id",
        "location_id",

    ];
    public function location()
    {
        return $this->belongsTo(Location::class);
    }
    public function package()
    {
        return $this->belongsTo(Package::class);
    }
}
