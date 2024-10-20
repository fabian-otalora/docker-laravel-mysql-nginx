<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

class Post extends Model
{
    protected $fillable = [
        'player_id',
        'text',
    ];

    /**
     * Get all of the country for the Post
     */
    public function country(): HasOneThrough
    {
        return $this->hasOneThrough(Country::class, Player::class);
    }
}