<?php

namespace App\Http\Controllers\Admin;

use App\Dto\RamadanCalendarDto\StoreRamadanCalendarDto;
use App\Dto\RamadanCalendarDto\UpdateRamadanCalendarDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\RamadanCalendar\StoreRamadanCalendarRequest;
use App\Http\Requests\RamadanCalendar\UpdateRamadanCalendarRequest;
use App\Models\RamadanCalendar;
use App\Models\Region;
use App\Services\RamadanCalendarService;
use Illuminate\Http\RedirectResponse;


class RamadanCalendarController extends Controller
{

    public function __construct(private readonly RamadanCalendarService $calendarService)
    {

    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ramadancalendar = RamadanCalendar::with('region.content')->firstOrNew()->paginate(30);
        return view('ramadancalendar.index', compact('ramadancalendar'));
    }

    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
        $regions = Region::with('content')->get();
        return view('ramadancalendar.create', compact('regions'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRamadanCalendarRequest $request): RedirectResponse
    {
       // dd($request->all());
        $this->calendarService->create(StoreRamadanCalendarDto::fromRequest($request));

        return redirect()->route('ramadancalendar.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(RamadanCalendar $ramadancalendar)
    {
        $ramadancalendar->load('region.content');
        return view('ramadancalendar.show', compact('ramadancalendar'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RamadanCalendar $ramadancalendar)
    {
        $regions = Region::with('content')->get();
        return view('ramadancalendar.edit', compact('ramadancalendar','regions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRamadanCalendarRequest $request,RamadanCalendar $ramadancalendar): RedirectResponse
    {
        //dd($request->all());
        $this->calendarService->update($ramadancalendar->id, UpdateRamadanCalendarDto::fromRequest($request));

        return redirect()->route('ramadancalendar.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RamadanCalendar $ramadancalendar): RedirectResponse
    {
        $ramadancalendar->delete();
        return redirect()->route('ramadancalendar.index');
    }

}
