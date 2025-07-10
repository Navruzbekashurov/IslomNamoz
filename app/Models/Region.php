<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Region extends Model
{


    public function content(): MorphMany
    {
        return $this->morphMany(Translation::class, 'entity');

    }


    public function ramadanCalendar(): HasMany
    {
        return $this->hasMany(RamadanCalendar::class);

    }
}
