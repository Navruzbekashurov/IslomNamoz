<?php

namespace App\Dto\SectionDto;

use App\Http\Requests\Section\UpdateSectionRequest;

class UpdateSectionDto
{

    public function __construct(
        public int $type_id,
        public array $content
    )
    {
    }

    public static function fromRequest(UpdateSectionRequest $request): UpdateSectionDto
    {
        $validated = $request->validated();

        $contentDto = array_map(
            fn($item) => new UpdateSectionContentDto(
                $item['id'],
                $item['language'],
                $item['field_name'],
                $item['field_value']
            ),
            $validated['content']
        );

        return new self(
            $validated['type_id'],
            $contentDto
        );
    }
}
