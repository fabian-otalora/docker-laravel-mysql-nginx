<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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
     * Get the genre that owns the VideoGame
     */
    public function genre(): BelongsTo
    {
        return $this->belongsTo(Genre::class);
    }

    /**
     * The players that belong to the VideoGame
     */
    public function players(): BelongsToMany
    {
        return $this->belongsToMany(Player::class, 'players_video_games');
    }

    /**
     * Get active video games
     */
    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }
}
