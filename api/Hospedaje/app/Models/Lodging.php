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
        "page",
        "start_range",
        "end_range",
        "backroom",
        "ofert_id",
        "location_id",
        "user_id"

    ];

    public function comment()
    {
        return $this->hasMany(Comment::class);
    }

    public function reservation()
    {
        return $this->belongsTo(Reservation::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function city(){
        return $this->belongsTo(City::class);
    }

    public function country(){
        return $this->belongsTo(Country::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function ofert()
    {
        return $this->belongsTo(Ofert::class);
    }
}
