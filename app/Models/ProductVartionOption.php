<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVartionOption extends Model
{
    use HasFactory;
    protected $fillable = ['var_option_name', 'prix', 'image', 'sku', 'variation_option_id', 'pr_a_id', 'pr_v_id'];

    public function variationOption()
    {
        return $this->belongsTo(VariationOption::class, 'variation_option_id');
    }

    public function prixAchat()
    {
        return $this->belongsTo(PrixAchat::class, 'pr_a_id');
    }

    public function prixVente()
    {
        return $this->belongsTo(PrixVente::class, 'pr_v_id');
    }

    public function stocks()
    {
        return $this->hasMany(Stock::class, 'product_variation_option_id');
    }
}
