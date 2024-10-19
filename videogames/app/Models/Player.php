<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Player extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'age',
        'email',
    ];

    /**
     * Get all of the videogames for the Player
     */
    public function videogames(): HasMany
    {
        return $this->hasMany(VideoGame::class);
    }

    /**
     * Get players by date
     */
    public function scopeCreatedBetween($query, $startDate, $endDate){
        return $this->whereBetween('created_at', [$startDate, $endDate]);
    }
}
