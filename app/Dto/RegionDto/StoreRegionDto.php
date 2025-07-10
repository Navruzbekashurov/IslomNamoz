<?php

namespace App\Dto\RegionDto;

use App\Http\Requests\Region\StoreRegionRequest;

class StoreRegionDto
{
    public function __construct(
        public array $content
    )
    {
    }

    public static function fromRequest(StoreRegionRequest $request): StoreRegionDto
    {
        $validated = $request->validated();

        $contentDto = array_map(
            fn($item) => new StoreRegionContentDto(
                $item['language'],
                $item['field_name'],
                $item['field_value']
            ),
            $validated['content']
        );

        return new self(
            $contentDto
        );
    }
}
