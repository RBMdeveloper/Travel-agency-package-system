<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class itinarie extends Model
{
    protected $fillable = ['package_id', 'day_number', 'title', 'description'];

    public function package()
    {
        return $this->belongsTo(Package::class);
    }
}
