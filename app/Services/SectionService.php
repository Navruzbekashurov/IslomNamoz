<?php

namespace App\Services;

use App\Dto\SectionDto\StoreSectionDto;
use App\Dto\SectionDto\UpdateSectionDto;
use App\Models\Section;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class SectionService
{


    public function create(StoreSectionDto $dto)
    {

        $section = Section::create([
            'type_id' => $dto->type_id
        ]);

        foreach ($dto->content as $item) {
            $section->content()->create([
                'language' => $item->language,
                'field_name' => $item->field_name,
                'field_value' => $item->field_value,
            ]);
        }

        return $section;
    }

    public function update($id, UpdateSectionDto $dto)
    {
        $section = Section::query()->where('id', $id)->first();
        if (!$section) {
            throw new ModelNotFoundException();
        }

        $section->update([
            'type_id' => $dto->type_id
        ]);

        foreach ($dto->content as $item) {
            $content = $section->content()->where('id', $item->id)->first();

            if (!$content) {
                throw new ModelNotFoundException();
            }

            $content->language = $item->language;
            $content->field_name = $item->field_name;
            $content->field_value = $item->field_value;
            $content->save();
        }
        return $section->fresh();

    }
}
