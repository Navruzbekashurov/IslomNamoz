<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\RamadanCalendarResource;
use App\Models\RamadanCalendar;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use OpenApi\Annotations as OA;

class RamadanCalendarController
{
    /**
     * @OA\Get(
     *     path="/api/ramadan-calendar/by-region",
     *     summary="Get Ramadan calendar by region ID",
     *     description="Returns full Ramadan calendar (30 days) for a region.",
     *     tags={"Ramadan Calendar"},
     *     @OA\Parameter(
     *         name="region_id",
     *         in="query",
     *         description="ID of the region",
     *         required=true,
     *         @OA\Schema(type="integer", example=1)
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="List of Ramadan calendar days",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/RamadanCalendarResource")
     *         )
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="region_id needed"
     *     )
     * )
     */





    public function byRegion(Request $request): JsonResponse
    {
        $region_id = $request->query('region_id');

        if (!$region_id) {
            return response()->json(['message' => 'region_id needed'], 400);
        }

        $calendar = RamadanCalendar::where('region_id', $region_id)
            ->orderBy('date')
            ->get();

        return response()->json(RamadanCalendarResource::collection($calendar));
    }
}
