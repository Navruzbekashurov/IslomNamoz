<?php

namespace App\Dto\TypeDto;

use App\Http\Requests\Type\UpdateTypeRequest;

class UpdateTypeDto
{

    public function __construct(
        public string $name
    )
    {
    }


    public static function fromRequest(UpdateTypeRequest $request): UpdateTypeDto
    {

        return new self(
            $request->validated('name')
        );

    }

}
