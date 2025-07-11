<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="RegionResource",
 *     type="object",
 *     title="Region Resource",
 *     description="Region information",
 *     required={"id", "name"},
 *     @OA\Property(
 *         property="id",
 *         type="integer",
 *         example=1,
 *         description="Region ID"
 *     ),
 *     @OA\Property(
 *         property="name",
 *         type="string",
 *         example="Toshkent",
 *         description="Region name"
 *     )
 * )
 */
class RegionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request): array
    {

        $translation = [];

        foreach ($this->content as $content) {
            $translation[$content["field_name"]] = $content["field_value"];
        }

        $data = [
            'id' => $this->id,
        ];
        return  array_merge($data, $translation);

    }
}
