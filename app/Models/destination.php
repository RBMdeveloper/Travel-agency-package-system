<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class destination extends Model
{
    protected $fillable = ['name', 'image'];

    public function packages()
    {
        return $this->hasMany(Package::class);
    }
    
}
