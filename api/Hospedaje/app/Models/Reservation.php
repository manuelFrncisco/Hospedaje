<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "lodging_id",
        "start_date",
        "end_date"
    ];

    public function lodging()
    {
        return $this->belongsTo(Lodging::class);
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

    public function hasEnded()
    {
        return $this->end_date <= Carbon::now();
    }

    public function hasBeenRated()
    {
        return $this->rating_id !== null;
    }

    public function hasUserRated($userId)
    {
        return $this->ratings->contains('user_id', $userId);
    }
}
