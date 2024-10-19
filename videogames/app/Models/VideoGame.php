<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class VideoGame extends Model
{
    use HasFactory;

    protected $fillable = [
        'player_id',
        'name',
        'genre',
        'active'
    ];

    /**
     * Get the player that owns the VideoGame
     */
    public function player(): BelongsTo
    {
        return $this->belongsTo(Player::class);
    }

    /**
     * Get active video games
     */
    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }
}
