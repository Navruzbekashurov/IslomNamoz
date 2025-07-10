<?php

namespace App\Dto\AllahNameDto;
use App\Http\Requests\AllahName\UpdateAllahNameRequest;

class UpdateAllahNameDto
{

    public function __construct(
        public string $name_arabic,
        public array  $content
    )
    {
    }

    public static function fromRequest(UpdateAllahNameRequest $request): UpdateAllahNameDto
    {
        $validated = $request->validated();

        $contentDto = array_map(
            fn($item) => new UpdateAllahNameContentDto(
                $item['id'],
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
