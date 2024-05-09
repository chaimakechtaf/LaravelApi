<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    protected $fillable = ['total', 'prix_unite', 'product_variation_option_id'];

    public function productVariationOption()
    {
        return $this->belongsTo(ProductVariationOption::class, 'product_variation_option_id');
    }
}
