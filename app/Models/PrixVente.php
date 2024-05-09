<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrixVente extends Model
{
    use HasFactory;
    protected $fillable = ['Type'];

    public function productVariationOptions()
    {
        return $this->hasMany(ProductVariationOption::class, 'pr_v_id');
    }

    

    
}
