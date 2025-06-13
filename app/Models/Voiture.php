<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voiture extends Model
{
    use HasFactory;

    protected $fillable = [
        'marque',
        'modele',
        'prix_journalier',
        'disponible',
        'image',
    ];


    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

}
