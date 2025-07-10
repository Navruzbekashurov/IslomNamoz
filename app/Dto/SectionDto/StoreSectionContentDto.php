<?php

namespace App\Dto\SectionDto;

class StoreSectionContentDto
{

    public function __construct(
        public string $language,
        public string $field_name,
        public string $field_value,
    )
    {
    }
}
