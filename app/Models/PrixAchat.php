<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrixAchat extends Model
{
    use HasFactory;

    protected $fillable = ['type'];

    public function productVariationOptions()
    {
        return $this->hasMany(ProductVariationOption::class, 'pr_a_id');
    }
   
}
