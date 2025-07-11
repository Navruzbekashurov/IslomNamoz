<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\SectionResource;
use App\Models\Section;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use OpenApi\Annotations as OA;

class SectionController
{
    /**
     * @OA\Get(
     *     path="/api/sections",
     *     summary="Get sections by language and optional type ID",
     *     description="Returns a list of sections filtered by language and optionally by type ID.",
     *     tags={"Sections"},
     *     @OA\Parameter(
     *         name="lang",
     *         in="query",
     *         description="Language code (uz, ru, en, уз)",
     *         required=false,
     *         @OA\Schema(type="string", example="en")
     *     ),
     *     @OA\Parameter(
     *         name="type_id",
     *         in="query",
     *         description="Filter by ID (optional)",
     *         required=false,
     *         @OA\Schema(type="integer", example=1)
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="List of sections",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/SectionResource")
     *         )
     *     )
     * )
     */


    public function section(Request $request): JsonResponse
    {
        $lang = $request->query('lang', 'en');
        $type_id = $request->query('type_id');

        $query = Section::with(['content' => fn($q) => $q->where('language', $lang)]);


        //dd($query->get());
        if ($type_id) {
            $query->where('type_id', $type_id);
        }

        $sections = $query->get();

        return response()->json(SectionResource::collection($sections));
    }


}
