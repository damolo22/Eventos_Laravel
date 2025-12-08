<?php
use App\Http\Controllers\OrganizerController; 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\VenueController;




Route::get('/', [OrganizerController::class, 'index']);

Route::resource('events', EventController::class);

Route::resource('venues', VenueController::class);

Route::resource('organizadores', OrganizerController::class);

