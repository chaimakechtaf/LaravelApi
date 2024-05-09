<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Methode_Paiement extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'numero',
        'expiration',
        'titulaire',
        'paiement_id',
    ];

    public function panier()
    {
        return $this->belongsTo(Panier::class);
    }
}
