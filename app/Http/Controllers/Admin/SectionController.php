<?php

namespace App\Http\Controllers\Admin;

use App\Dto\SectionDto\StoreSectionDto;
use App\Dto\SectionDto\UpdateSectionDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\Section\StoreSectionRequest;
use App\Http\Requests\Section\UpdateSectionRequest;
use App\Models\Section;
use App\Models\Type;
use App\Services\SectionService;
use Illuminate\Http\RedirectResponse;

class SectionController extends Controller
{
    public function __construct(private readonly SectionService $sectionService)
    {

    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $section = Section::with('content')->latest()->paginate(10);

        return view('section.index', compact('section'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $types = Type::all();
        return view('section.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSectionRequest $request): RedirectResponse
    {

        $this->sectionService->create(StoreSectionDto::fromRequest($request));

        return redirect()->route('section.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Section $section)
    {
        $section->load('content');

        return view('section.show', compact('section'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Section $section)
    {
        $types = Type::all();
        $section->load('content');
        return view('section.edit', compact('section', 'types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(int $id, UpdateSectionRequest $request): RedirectResponse
    {

        $this->sectionService->update($id,UpdateSectionDto::fromRequest($request));

        return redirect()->route('section.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Section $section): RedirectResponse
    {
        $section->content()->delete();
        $section->delete();

        return redirect()->route('section.index');
    }

}
