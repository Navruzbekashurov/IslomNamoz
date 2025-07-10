<?php

namespace App\Services;

use App\Dto\AllahNameDto\StoreAllahNameDto;
use App\Dto\AllahNameDto\UpdateAllahNameDto;
use App\Models\AllahName;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class AllahnameService
{

    public function create(StoreAllahNameDto $dto): AllahName
    {
        $allahname = AllahName::create([
            'name_arabic' => $dto->name_arabic
        ]);

        foreach ($dto->content as $item) {
            $allahname->content()->create([
                'language' => $item->language,
                'field_name' => $item->field_name,
                'field_value' => $item->field_value,
            ]);
        }

        return $allahname;
    }

    public function update($id, UpdateAllahNameDto $dto): AllahName
    {
        $allahname = AllahName::query()->where('id', $id)->first();
        if (!$allahname) {
            throw new ModelNotFoundException();
        }

        $allahname->update([
            'name_arabic' => $dto->name_arabic
        ]);

        foreach ($dto->content as $item) {
            $content = $allahname->content()->where('id', $item->id)->first();

            if (!$content) {
                throw new ModelNotFoundException();
            }

            $content->language = $item->language;
            $content->field_name = $item->field_name;
            $content->field_value = $item->field_value;
            $content->save();
        }
        return $allahname;

    }}




