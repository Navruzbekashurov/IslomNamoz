<?php

namespace App\Dto\AllahNameDto;

use App\Http\Requests\AllahName\StoreAllahNameRequest;

class StoreAllahNameDto
{

    public function __construct(
        public string $name_arabic,
        public array  $content
    )
    {
    }

    public static function fromRequest(StoreAllahNameRequest $request): StoreAllahNameDto
    {
        $validated = $request->validated();

        $contentDto = array_map(
            fn($item) => new StoreAllahNameContentDto(
                $item['language'],
                $item['field_name'],
                $item['field_value']
            ),
            $validated['content']
        );

        return new self(
            $validated['name_arabic'],
            $contentDto
        );
    }
}
