<?php

namespace App\Dto\RamadanCalendarDto;

use App\Http\Requests\RamadanCalendar\UpdateRamadanCalendarRequest;

class UpdateRamadanCalendarDto
{

    public function __construct(
        public int $region_id,
        public string $date,
        public string $suhoor_time,
        public string $iftar_time
    )
    {
    }

    public static function fromRequest(UpdateRamadanCalendarRequest $request): UpdateRamadanCalendarDto
    {
        return new self(
            $request->validated('region_id'),
            $request->validated('date'),
            $request->validated('suhoor_time'),
            $request->validated('iftar_time')
        );

    }

}
