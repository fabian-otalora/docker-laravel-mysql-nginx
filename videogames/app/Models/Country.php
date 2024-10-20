<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Country extends Model
{
    
    protected $fillable = [
        'player_id',
        'country',
        'city',
    ];

    /**
     * Get the player associated with the Country
     */
    public function player(): HasOne
    {
        return $this->hasOne(Player::class);
    }

}