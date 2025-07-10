<?php

namespace App\Dto\RegionDto;

use App\Http\Requests\Region\UpdateRegionRequest;

class UpdateRegionDto
{
    public function __construct(
        public array $content
    )
    {
    }

    public static function fromRequest(UpdateRegionRequest $request): UpdateRegionDto
    {
        $validated = $request->validated();

        $contentDto = array_map(
            fn($item) => new UpdateRegionContentDto(
                $item['id'],
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
