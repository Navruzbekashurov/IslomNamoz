<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property mixed $id
 * @method static where(string $string, array|string $region_id)
 */
class RamadanCalendar extends Model
{
    /**
     * @property int $region_id
     * @property string $date
     * @property string $suhoor_time
     * @property string $iftar_time
     */
    protected $fillable = ['region_id', 'date', 'suhoor_time', 'iftar_time'];

    public function region(): BelongsTo
    {

        return $this->belongsTo(Region::class);

    }
}
