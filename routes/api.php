<?php

use App\Http\Controllers\Api\AllahNameController;
use App\Http\Controllers\Api\RamadanCalendarController;
use App\Http\Controllers\Api\RegionController;
use App\Http\Controllers\Api\SectionController;

Route::get('/regions', [RegionController::class, 'region']);

Route::get('/ramadan-calendar/by-region', [RamadanCalendarController::class, 'byRegion']);



Route::get('/sections', [SectionController::class, 'section']);

Route::get('/allah-names', [AllahNameController::class, 'allahname']);
