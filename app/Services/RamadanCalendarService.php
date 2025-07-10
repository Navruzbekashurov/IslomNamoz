<?php

namespace App\Services;

use App\Models\RamadanCalendar;
use App\Dto\RamadanCalendarDto\UpdateRamadanCalendarDto;
use App\Dto\RamadanCalendarDto\StoreRamadanCalendarDto;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class RamadanCalendarService
{

    public function create(StoreRamadanCalendarDto $dto): RamadanCalendar
    {

        $ramadan = new RamadanCalendar();

        $ramadan->region_id = $dto->region_id;
        $ramadan->date = $dto->date;
        $ramadan->suhoor_time = $dto->suhoor_time;
        $ramadan->iftar_time = $dto->iftar_time;
        $ramadan->save();
        return $ramadan ;
    }

    public function update(int $id, UpdateRamadanCalendarDto $dto): RamadanCalendar
    {
        $ramadan = RamadanCalendar::query()
            ->where('id', $id)
            ->first();
        if (!$ramadan){
            throw new ModelNotFoundException();
        }


        $ramadan->region_id = $dto->region_id;
        $ramadan->date = $dto->date;
        $ramadan->suhoor_time = $dto->suhoor_time;
        $ramadan->iftar_time = $dto->iftar_time;

        $ramadan->save();
        return $ramadan;


    }

}
