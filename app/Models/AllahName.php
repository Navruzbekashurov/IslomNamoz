<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

/**
 * @method static create(array $array)
 */
class AllahName extends Model
{

    protected $fillable = [
        'name_arabic',
    ];


    public function content(): MorphMany
    {
        return $this->morphMany(Translation::class, 'entity');
    }
}
