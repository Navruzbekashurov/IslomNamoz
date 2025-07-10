<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\AllahNameResource;
use App\Models\AllahName;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use OpenApi\Annotations as OA;

class AllahNameController
{
    /**
     * @OA\Get(
     *     path="/api/allah-names",
     *     summary="Get list of Allah's names",
     *     description="Returns 99 names of Allah filtered by language and optionally by type_id",
     *     tags={"Allah Names"},
     *     @OA\Parameter(
     *         name="lang",
     *         in="query",
     *         description="Language code (uz, en, ru, etc.)",
     *         required=false,
     *         @OA\Schema(type="string", example="en")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful response with list of names",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/AllahNameResource")
     *         )
     *     )
     * )
     */

    public function allahname(Request $request): JsonResponse
    {
        $lang = $request->query('lang', 'uz');

        $names = AllahName::with(['content' => fn($q) => $q->where('language', $lang)])
            ->orderBy('id')
            ->get();

        return response()->json(AllahNameResource::collection($names));
    }
}
