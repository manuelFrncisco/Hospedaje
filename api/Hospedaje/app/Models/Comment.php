<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        "messaje",
        "user_id",
        "lodging_id"
    ];

    protected $with = ['user']; // Cargar la relación 'user' automáticamente

    public function lodging()
    {
        return $this->belongsTo(Lodging::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class)->withoutGlobalScopes(); // No aplicar alcances globales
    }
}

