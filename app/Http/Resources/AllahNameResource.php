<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="AllahNameResource",
 *     type="object",
 *     title="Allah Name",
 *     required={"id", "name", "description"},
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="name_arabic", type="string", example="الرَّحْمَٰن"),
 *     @OA\Property(property="name", type="string", example="Ar-Rahman"),
 *     @OA\Property(property="description", type="string", example="The Most Merciful")
 * )
 */
class AllahNameResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request): array
    {
        $transaltion = [];

        foreach ($this->content as $content) {
            $transaltion[$content['field_name']] = $content['field_value'];
        }

        $data = [
            'id' => $this->id,
            'name_arabic' => $this->name_arabic,
        ];

        return array_merge($data,$transaltion);

    }
}

//foreach ($this->content as $item) {
//    if ($item->field_name === 'name') {
//        $name = $item->field_value;
//    } elseif ($item->field_name === 'description') {
//        $description = $item->field_value;
//    }
//}
////        [
////            $item->field_name => $item->field_value
////            $item->field_name => $item->field_value
////            $item->field_name => $item->field_value
////            $item->field_name => $item->field_value
////            $item->field_name => $item->field_value
////            $item->field_name => $item->field_value
////        ]
//return [
//    'id' => $this->id,
//    'name_arabic' => $this->name_arabic,
//    'name' => $name ?? 'unknown',
//    'description' => $description,
//];
