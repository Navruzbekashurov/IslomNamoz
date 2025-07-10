<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\RegionResource;
use App\Models\Region;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use OpenApi\Annotations as OA;

class RegionController
{
    /**
     * @OA\Get(
     *     path="/api/regions",
     *     summary="Get a list of regions",
     *     description="Returns a list of regions by language. If 'lang' is not specified, 'uz' is used.",
     *     tags={"Regions"},
     *     @OA\Parameter(
     *         name="lang",
     *         in="query",
     *         description="Language (uz, ru, en, уз)",
     *         required=false,
     *         @OA\Schema(type="string", example="uz")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="List of successful regions",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/RegionResource")
     *         )
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Error query"
     *     )
     * )
     * @param Request $request
     * @return JsonResponse
     */
    public function region(Request $request): JsonResponse
    {
        $lang = $request->query('lang', 'uz');

        $regions = Region::with(['content' => function ($q) use ($lang) {
            $q->where('language', $lang);
        }])->get();

        return response()->json(RegionResource::collection($regions));
    }
}
