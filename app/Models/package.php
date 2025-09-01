<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class package extends Model
{
    protected $fillable = ['destination_id', 'title', 'description','price', 'days_nights_detail', 'image'];

    public function destination()
    {
        return $this->belongsTo(Destination::class);
    }

    public function itineraries()
    {
        return $this->hasMany(itinarie::class);
    }
}
