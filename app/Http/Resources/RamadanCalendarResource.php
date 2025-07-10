<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;
use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="RamadanCalendarResource",
 *     title="Ramadan Day",
 *     type="object",
 *     required={"date", "suhur_time", "iftar_time"},
 *     @OA\Property(property="date", type="string", format="date", example="2025-03-22"),
 *     @OA\Property(property="suhur_time", type="string", example="04:45"),
 *     @OA\Property(property="iftar_time", type="string", example="18:47"),
 *     @OA\Property(property="region_id", type="integer", example=1)
 * )
 */




class RamadanCalendarResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */

    public function toArray($request): array
    {

        return [
            'id' => $this->id,
            'date' => $this->date,
            'suhoor_time' => $this->suhoor_time,
            'iftar_time' => $this->iftar_time,
        ];
    }


}
