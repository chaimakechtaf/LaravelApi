<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ligne_Commande extends Model
{
    use HasFactory;

    protected $fillable = [
        'quantite',
        'product_id',
        'product_var_option_id',
        'user_id',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function productVariationOption()
    {
        return $this->belongsTo(ProductVariationOption::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
