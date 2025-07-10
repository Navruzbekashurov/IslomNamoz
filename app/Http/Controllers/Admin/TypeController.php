<?php

namespace App\Http\Controllers\Admin;

use App\Dto\TypeDto\StoreTypeDto;
use App\Dto\TypeDto\UpdateTypeDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\Type\StoreTypeRequest;
use App\Http\Requests\Type\UpdateTypeRequest;
use App\Models\Type;
use App\Services\TypeService;
use Illuminate\Http\RedirectResponse;


class TypeController extends Controller
{

    public function __construct(private readonly TypeService $typeService)
    {

    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $type = Type::all();

        return view('type.index', compact('type'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('type.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTypeRequest $request): RedirectResponse
    {
        $this->typeService->create(StoreTypeDto::fromRequest($request));

        return redirect()->route('type.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Type $type)
    {

        return view('type.show', compact('type'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Type $type)
    {
        return view('type.edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(int $id, UpdateTypeRequest $request): RedirectResponse
    {
        $this->typeService->update($id,UpdateTypeDto::fromRequest($request) );

        return redirect()->route('type.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Type $type): RedirectResponse
    {
        $type->delete();

        return redirect()->route('type.index');
    }
}
