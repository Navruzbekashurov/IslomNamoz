<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="SectionResource",
 *     type="object",
 *     title="Section",
 *     required={"id", "type_id"},
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="type_id", type="integer", example=2),
 *     @OA\Property(
 *         property="name",
 *         type="string",
 *         example="Five Pillars of Islam",
 *         nullable=true,
 *         description="Translated section name in the requested language"
 *     ),
 *     @OA\Property(
 *         property="description",
 *         type="string",
 *         example="1. Shahada (Faith) 2. Salah (Prayer) 3. Sawm (Fasting in Ramadan) 4. Zakat (Charity) 5. Hajj (Pilgrimage to Mecca)",
 *         nullable=true,
 *         description="Translated section description listing the five pillars of Islam"
 *     )
 * )
 */
class SectionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request): array
    {
        $lang = $request->query('lang', 'en');

        foreach ($this->content as $content) {

                if ($content->field_name === 'name') {
                    $name = $content->field_value;
                } elseif ($content->field_name === 'description') {
                    $description = $content->field_value;
                }
            }

        return [
            'id' => $this->id,
            'type_id' => $this->type_id,
            'name' => $name,
            'description' => $description,
        ];
    }
}
////
////        foreach ($this->content as $content) {
////            $translation[] = [
////                $content["field_name"] => $content["field_value"]
////                // $content
////            ];
////        }
////        dd($translation);
////        dd($this->content[0]);
//        $name = $this->content
//            ->where('language', $lang)
//            ->where('field_name', 'name')
//            ->first()?->field_value ?? 'unknown';
//
//        $description = $this->content
//            ->where('language', $lang)
//            ->where('field_name', 'description')
//            ->first()?->field_value ?? null;
//
//        return [
//            'id' => $this->id,
//            'type_id' => $this->type_id,
//            'name' => $name,
//            'description' => $description,
//        ];
//    }



