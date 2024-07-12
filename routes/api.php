<?php

use App\Constants\RouteURLs;
use App\Http\Controllers\PetsController;
use Illuminate\Support\Facades\Route;

Route::get(RouteURLs::PETS_ENDPOINT, [PetsController::class, 'getPets']);
Route::post(RouteURLs::PETS_ENDPOINT, [PetsController::class, 'createPet']);
Route::get(RouteURLs::PETS_ENDPOINT_WITH_ID, [PetsController::class, 'getPetById'])->whereNumber(RouteURLs::PARAM_PET_ID);
Route::put(RouteURLs::PETS_ENDPOINT_WITH_ID, [PetsController::class, 'updatePet'])->whereNumber(RouteURLs::PARAM_PET_ID);
Route::delete(RouteURLs::PETS_ENDPOINT_WITH_ID, [PetsController::class, 'deletePet'])->whereNumber(RouteURLs::PARAM_PET_ID);

