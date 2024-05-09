<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'old_price',
        'new_price',
        'image',
        'description',
        'slug',
        'barcode',
        'ispublished',
        'facture',
        'instock',
        'categories_id',
        'subcategory',
    ];

    public function brand()
    {
        return $this->hasOne(Brand::class);
    }

    //Categories

    public function categories()
    {
        return $this->hasOne(categories::class);
    }

    

    //Variation

    public function variations()
    {
        return $this->hasMany(Variation::class);
    }
    


    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

    public function commandes()
    {
        return $this->hasMany(Commande::class);
    }


    public function ligneCommandes()
    {
        return $this->hasMany(LigneCommande::class);
    }




}
