<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class user extends Model
{
    protected $fillable =['name', 'email'];

    public function profile()
    {
        return $this->hasOne(UserProfile::class);
    }
    
}
