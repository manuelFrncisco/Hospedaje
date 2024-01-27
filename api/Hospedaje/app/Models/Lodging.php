<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lodging extends Model
{
    use HasFactory;

    protected $fillable = [
        "name","description","image","page","backroom","ofert_id","location_id"
    ] ;
}
