<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hero extends Model
{
    use HasFactory;

    protected $fillable = [
        'bg_img',
        'title',
        'subtitle'
    ];

    public function scopeLatestActive()
    {
        return $this->where('active', 1)->latest()->first();
    }
}
