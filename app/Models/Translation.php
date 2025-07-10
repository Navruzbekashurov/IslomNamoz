<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Translation extends Model
{
   // protected $fillable = ['language','field_name','field_value'];
    protected $fillable = [
        'language',
        'field_name',
        'field_value',
        'entity_id',
        'entity_type',
    ];

    public function entity(): MorphTo
    {
       return $this->morphTo();
    }

}
