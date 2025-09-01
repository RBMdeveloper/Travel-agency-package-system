<?php


use App\Http\Controllers\ppages;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DestinationController;
use App\Http\Controller\PackageController;
use App\Http\Controllers\ItineraryController;



Route::get('/', [DestinationController::class, 'index'])->name('destinations.index');
Route::get('/destinations/create', [DestinationController::class, 'create'])->name('destinations.create');
Route::post('/destinations', [DestinationController::class, 'store'])->name('destinations.store');
Route::get('/destinations/{id}/edit', [DestinationController::class, 'edit'])->name('destinations.edit');
Route::put('/destinations/{id}', [DestinationController::class, 'update'])->name('destinations.update');
Route::delete('/destinations/{id}', [DestinationController::class, 'destroy'])->name('destinations.destroy');
// handling packages
Route::get('/destinations/{id}/packages', [\App\Http\Controllers\PackageController::class, 'index'])->name('packages.index');


Route::get('/packages/create/{destination}', [\App\Http\Controllers\PackageController::class, 'create'])->name('packages.create');
Route::post('/packages/store/{destination}', [\App\Http\Controllers\PackageController::class, 'store'])->name('packages.store');


Route::get('/packages/{package}/edit', [\App\Http\Controllers\PackageController::class, 'edit'])->name('packages.edit');
Route::post('/packages/{package}/update', [\App\Http\Controllers\PackageController::class, 'update'])->name('packages.update');
Route::delete('/packages/{package}', [\App\Http\Controllers\PackageController::class, 'destroy'])->name('packages.destroy');

// Itinerary Routes
Route::get('/packages/{package}/itineraries', [ItineraryController::class, 'index'])->name('itineraries.index');
Route::get('/packages/{package}/itineraries/create', [ItineraryController::class, 'create'])->name('itineraries.create');
Route::post('/packages/{package}/itineraries', [ItineraryController::class, 'store'])->name('itineraries.store');
Route::get('/itineraries/{id}/edit', [ItineraryController::class, 'edit'])->name('itineraries.edit');
Route::put('/itineraries/{id}', [ItineraryController::class, 'update'])->name('itineraries.update');
Route::delete('/itineraries/{id}', [ItineraryController::class, 'destroy'])->name('itineraries.destroy');


