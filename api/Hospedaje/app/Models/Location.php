<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        "streep","postal", "country_id"] ;

        public function country()
        {
            return $this->belongsTo(Country::class);
        }
    }

