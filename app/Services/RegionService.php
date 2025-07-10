<?php

namespace App\Services;


use App\Dto\RegionDto\StoreRegionDto;
use App\Dto\RegionDto\UpdateRegionDto;
use App\Models\Region;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class RegionService
{
    public function create(StoreRegionDto $dto): Region
    {
        $region = Region::create();

        foreach ($dto->content as $item) {
            $region->content()->create([
                'language' => $item->language,
                'field_name' => $item->field_name,
                'field_value' => $item->field_value,
            ]);
        }

        return $region;
    }

    public function update(int $id, UpdateRegionDto $dto): Region
    {
        $region = Region::find($id);

        if (!$region) {
            throw new ModelNotFoundException();
        }

        foreach ($dto->content as $item) {
            $translation = $region->content()->where('id', $item->id)->first();

            if (!$translation) {
                throw new ModelNotFoundException();
            }

            $translation->update([
                'language' => $item->language,
                'field_name' => $item->field_name,
                'field_value' => $item->field_value,
            ]);
        }

        return $region->fresh();
    }
}
