<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Genre extends Model
{
    protected $fillable = [
        'name'
    ];

    /**
     * Get all of the videogames for the Genre
     */
    public function videogames(): HasMany
    {
        return $this->hasMany(VideoGame::class);
    }

}