<?php

namespace App\Dto\RegionDto;

class StoreRegionContentDto
{
    public function __construct(
        public string $language,
        public string $field_name,
        public string $field_value,
    )
    {
    }
}
