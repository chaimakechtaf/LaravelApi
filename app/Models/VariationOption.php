<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VariationOption extends Model
{
    use HasFactory;

    protected $fillable = ['var_option_name', 'var_id','type'];

    public function variation()
    {
        return $this->belongsTo(Variation::class, 'var_id');

    }

    public function productVariationOptions()
    {
        return $this->hasMany(ProductVariationOption::class, 'var_option_id');
    }

    
}
