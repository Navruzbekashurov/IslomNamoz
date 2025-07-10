<?php

namespace App\Dto\SectionDto;

use App\Http\Requests\Section\StoreSectionRequest;

class StoreSectionDto
{

    public function __construct(
        public int $type_id,
        public array $content
    )
    {
    }

    public static function fromRequest(StoreSectionRequest $request): StoreSectionDto
    {
        $validated = $request->validated();

        $contentDto = array_map(
            fn($item) => new StoreSectionContentDto(
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
