<?php

namespace App\Dto\SectionDto;

class UpdateSectionContentDto
{
    public function __construct(
        public int $id,
        public string $language,
        public string $field_name,
        public string $field_value
    ) {}
}
