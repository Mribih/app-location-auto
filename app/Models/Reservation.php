<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'voiture_id',
        'date_debut',
        'date_fin',
        'statut',
    ];

    public function voiture()
    {
        return $this->belongsTo(Voiture::class);
    }

}
