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
        foreach ($this->content as $item) {
                if ($item->field_name === 'name') {
                    $name = $item->field_value;
                } elseif ($item->field_name === 'description') {
                    $description = $item->field_value;
                }
            }
        return [
            'id' => $this->id,
            'name' => $name ?? 'unknown',
            'description' => $description,
        ];
    }
}
