<?php

namespace App\Services;

use App\Dto\TypeDto\StoreTypeDto;
use App\Dto\TypeDto\UpdateTypeDto;
use App\Models\Type;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class TypeService
{

    public function create(StoreTypeDto $typeDto): Type
    {
        $type = new Type();
        $type->name = $typeDto->name;
        $type->save();

        return $type;
    }


    public function update(int $id, UpdateTypeDto $typeDto): void
    {
        $type = Type::query()
            ->where('id', $id)
            ->first();
        if (!$type){
            throw new ModelNotFoundException();
        }

        $type->name = $typeDto->name;
        $type->save();
        ;



    }

}
