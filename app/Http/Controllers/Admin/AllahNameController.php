<?php

namespace App\Http\Controllers\Admin;

use App\Dto\AllahNameDto\StoreAllahNameDto;
use App\Dto\AllahNameDto\UpdateAllahNameDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\AllahName\StoreAllahNameRequest;
use App\Http\Requests\AllahName\UpdateAllahNameRequest;
use App\Models\AllahName;
use App\Services\AllahnameService;
use Illuminate\Http\RedirectResponse;

class AllahNameController extends Controller
{

    public function __construct(private readonly AllahnameService $allahNameService)
    {

    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $name = AllahName::with('content')->latest()->paginate(10);
        return view('allahnames.index', compact('name'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('allahnames.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAllahNameRequest $request): RedirectResponse
    {
        $name = $this->allahNameService->create(StoreAllahNameDto::fromRequest($request));

        return redirect()->route('allahnames.index',compact('name'));
    }

    /**
     * Display the specified resource.
     */
    public function show(AllahName $allahname)
    {
        $allahname->load('content');
        return view('allahnames.show', compact('allahname'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AllahName $allahname)
    {
        return view('allahnames.edit', compact('allahname'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(int $id, UpdateAllahNameRequest $request): RedirectResponse
    {
        //dd($request->all());
        $this->allahNameService->update($id,UpdateAllahNameDto::fromRequest($request));

        return redirect()->route('allahnames.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AllahName $allahname): RedirectResponse
    {
        $allahname->content()->delete();
        $allahname->delete();

        return redirect()->route('allahnames.index');
    }


}
