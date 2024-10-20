<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Profile extends Model
{
    protected $fillable = [
        'player_id',
        'username',
        'description',
    ];

    /**
     * Get the player that owns the Profile
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(Player::class);
    }
}