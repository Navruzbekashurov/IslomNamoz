<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;

/**
 * @method static create(array $array)
 */
class Section extends Model
{

    protected $fillable = [
        'type_id',
    ];


    public function content(): MorphMany
    {
        return $this->morphMany(Translation::class, 'entity');
    }


    public function type(): BelongsTo
    {
        return $this->belongsTo(Type::class);
    }

}
