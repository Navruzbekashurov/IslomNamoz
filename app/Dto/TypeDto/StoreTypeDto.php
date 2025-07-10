<?php

namespace App\Dto\TypeDto;

use App\Http\Requests\Type\StoreTypeRequest;

class StoreTypeDto
{
    public function __construct(
        public string $name
    )
    {
    }


    public static function fromRequest(StoreTypeRequest $request): StoreTypeDto
    {

        return new self(
            $request->validated('name')
        );

    }

}
