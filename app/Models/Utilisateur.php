<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Utilisateur extends Model
{
    use HasFactory;

    protected $fillable = ['FName', 'LName', 'Email', 'UserName', 'Password'];

    public function admin()
    {
        return $this->hasOne(Admin::class, 'idUser');
    }
}
