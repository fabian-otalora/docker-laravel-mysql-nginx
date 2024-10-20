<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Player extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'age',
        'email',
    ];

    /**
     * The videogames that belong to the Player
     */
    public function videogames(): BelongsToMany
    {
        return $this->belongsToMany(VideoGames::class, 'players_video_games');
    }

    /**
     * Get the profile associated with the Player
     */
    public function profile(): HasOne
    {
        return $this->hasOne(Profile::class);
    }

    /**
     * Get the country that owns the Player
     */
    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

    /**
     * Get players by date
     */
    public function scopeCreatedBetween($query, $startDate, $endDate){
        return $this->whereBetween('created_at', [$startDate, $endDate]);
    }
}
