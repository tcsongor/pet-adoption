<?php

use App\Constants\RouteURLs;
use App\Http\Controllers\PetsController;
use Illuminate\Support\Facades\Route;

Route::get(RouteURLs::PETS_ENDPOINT, [PetsController::class, 'getPets'])->name('r1');
Route::get(RouteURLs::PETS_ENDPOINT_WITH_ID, [PetsController::class, 'getPetById'])->name('r2');
Route::post(RouteURLs::PETS_ENDPOINT, [PetsController::class, 'createPet'])->name('r3');
Route::put(RouteURLs::PETS_ENDPOINT_WITH_ID, [PetsController::class, 'updatePet'])->name('r4');
Route::delete(RouteURLs::PETS_ENDPOINT_WITH_ID, [PetsController::class, 'deletePet'])->name('r5');
