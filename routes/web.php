<?php
use App\Http\Controllers\OrganizerController; 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\VenueController;
use App\Http\Controllers\AsistenteController;



Route::get('/', function () {
    return view('welcome');
});


Route::resource('events', EventController::class);

Route::resource('venues', VenueController::class);

Route::resource('organizadores', OrganizerController::class);

Route::resource('asistentes', AsistenteController::class);