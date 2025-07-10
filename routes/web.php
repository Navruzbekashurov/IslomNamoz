<?php

use App\Http\Controllers\Admin\AllahNameController;
use App\Http\Controllers\Admin\RamadanCalendarController;
use App\Http\Controllers\Admin\RegionController;
use App\Http\Controllers\Admin\SectionController;
use App\Http\Controllers\Admin\TypeController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login.page');
});

Route::get('/login', [UserController::class, 'showLogin'])->name('login.page');
Route::post('/login', [UserController::class, 'login'])->name('login');

Route::post('/logout', [UserController::class, 'logout'])->name('logout');


Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', function () { return view('dashboard');})->name('dashboard');


    Route::get('/allahnames', [AllahNameController::class, 'index'])->name('allahnames.index');
    Route::get('/allahnames/create', [AllahNameController::class, 'create'])->name('allahnames.create');
    Route::post('/allahnames', [AllahNameController::class, 'store'])->name('allahnames.store');
    Route::get('/allahnames/{allahname}', [AllahNameController::class, 'show'])->name('allahnames.show');
    Route::get('/allahnames/{allahname}/edit', [AllahNameController::class, 'edit'])->name('allahnames.edit');
    Route::put('/allahnames/{allahname}', [AllahNameController::class, 'update'])->name('allahnames.update');
    Route::patch('/allahnames/{allahname}', [AllahNameController::class, 'update'])->name('allahnames.update');
    Route::delete('/allahnames/{allahname}', [AllahNameController::class, 'destroy'])->name('allahnames.destroy');


    Route::get('/section', [SectionController::class, 'index'])->name('section.index');
    Route::get('/section/create', [SectionController::class, 'create'])->name('section.create');
    Route::post('/section', [SectionController::class, 'store'])->name('section.store');
    Route::get('/section/{section}', [SectionController::class, 'show'])->name('section.show');
    Route::get('/section/{section}/edit', [SectionController::class, 'edit'])->name('section.edit');
    Route::put('/section/{section}', [SectionController::class, 'update'])->name('section.update');
    Route::delete('/section/{section}', [SectionController::class, 'destroy'])->name('section.destroy');


    Route::get('type', [TypeController::class, 'index'])->name('type.index');
    Route::get('type/create', [TypeController::class, 'create'])->name('type.create');
    Route::post('type', [TypeController::class, 'store'])->name('type.store');
    Route::get('type/{type}', [TypeController::class, 'show'])->name('type.show');
    Route::get('type/{type}/edit', [TypeController::class, 'edit'])->name('type.edit');
    Route::put('type/{type}', [TypeController::class, 'update'])->name('type.update');
    Route::delete('type/{type}', [TypeController::class, 'destroy'])->name('type.destroy');


    Route::get('region', [RegionController::class, 'index'])->name('region.index');
    Route::get('region/create', [RegionController::class, 'create'])->name('region.create');
    Route::post('region', [RegionController::class, 'store'])->name('region.store');
    Route::get('region/{region}/edit', [RegionController::class, 'edit'])->name('region.edit');
    Route::put('region/{region}', [RegionController::class, 'update'])->name('region.update');
    Route::delete('region/{region}', [RegionController::class, 'destroy'])->name('region.destroy');


    Route::get('/ramadancalendar', [RamadanCalendarController::class, 'index'])->name('ramadancalendar.index');
    Route::get('ramadancalendar/create', [RamadanCalendarController::class, 'create'])->name('ramadancalendar.create');
    Route::post('ramadancalendar', [RamadanCalendarController::class, 'store'])->name('ramadancalendar.store');
    Route::get('ramadancalendar/{ramadancalendar}', [RamadanCalendarController::class, 'show'])->name('ramadancalendar.show');
    Route::get('ramadancalendar/{ramadancalendar}/edit', [RamadanCalendarController::class, 'edit'])->name('ramadancalendar.edit');
    Route::put('ramadancalendar/{ramadancalendar}', [RamadanCalendarController::class, 'update'])->name('ramadancalendar.update');
    Route::delete('ramadancalendar/{ramadancalendar}', [RamadanCalendarController::class, 'destroy'])->name('ramadancalendar.destroy');

});

