<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom_categorie',
        'product_id',
    ];

    public function products()
    {
        return $this->hasMany(Product::class, 'categories_id');
    }

}
