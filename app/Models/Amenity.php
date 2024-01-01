<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Amenity extends Model
{
    use HasFactory;

    public function scopeActiveAmenities($query)
    {
        return $query->where('status', 1)->get();
    }

    public function listings(): BelongsToMany
    {
        return $this->belongsToMany(Listing::class, 'amenity_listing')->withTimestamps();
    }
}
