<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variations extends Model
{
    use HasFactory;

    protected $fillable = ['var_name'];

    public function variationOptions()
    {
        return $this->hasMany(VariationOption::class, 'var_id');
    }
}
