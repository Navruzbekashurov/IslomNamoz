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
        $lang = $request->query('lang', 'uz');

        $name = $this->content
            ->where('language', $lang)
            ->first()
            ?->field_value ?? 'unknown';

        return [
            'id' => $this->id,
            'name' => $name,
        ];
    }
}
