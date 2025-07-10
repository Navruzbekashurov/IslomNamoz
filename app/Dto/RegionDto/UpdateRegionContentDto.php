<?php

namespace App\Dto\RegionDto;

class UpdateRegionContentDto
{
    public function __construct(
        public int $id,
        public string $language,
        public string $field_name,
        public string $field_value,
    )
    {
    }
}
