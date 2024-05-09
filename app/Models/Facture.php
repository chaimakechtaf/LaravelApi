<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facture extends Model
{
    use HasFactory;

    protected $fillable = [
        'f_name',
        'l_name',
        'libelle',
        'prix_unitaire',
        'total',
        'total_ht',
        'user_id',
        'commande_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function commande()
    {
        return $this->belongsTo(Commande::class);
    }
}
