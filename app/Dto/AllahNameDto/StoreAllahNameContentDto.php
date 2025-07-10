<?php

namespace App\Dto\AllahNameDto;

class StoreAllahNameContentDto
{
    public function __construct(
        public string $language,
        public string $field_name,
        public string $field_value,
    ) {}
}
