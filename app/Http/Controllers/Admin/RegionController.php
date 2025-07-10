<?php

namespace App\Http\Controllers\Admin;

use App\Dto\RegionDto\StoreRegionDto;
use App\Dto\RegionDto\UpdateRegionDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\Region\StoreRegionRequest;
use App\Http\Requests\Region\UpdateRegionRequest;
use App\Models\Region;
use App\Services\RegionService;
use Illuminate\Http\RedirectResponse;

class RegionController extends Controller
{

    public function __construct(private readonly RegionService $regionService)
    {

    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $region = Region::with('content')->latest()->paginate(10);

        return view('region.index', compact('region'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('region.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRegionRequest $request): RedirectResponse
    {
        $this->regionService->create(StoreRegionDto::fromRequest($request));

        return redirect()->route('region.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Region $region)
    {

        return view('region.edit', compact('region'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(int $id, UpdateRegionRequest $request): RedirectResponse
    {
        // dd($request->all());

        $dto = UpdateRegionDto::fromRequest($request);
        $this->regionService->update($id, $dto);

        return redirect()->route('region.index');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Region $region): RedirectResponse
    {
        $region->content()->delete();
        $region->delete();

        return redirect()->route('region.index');
    }

}
