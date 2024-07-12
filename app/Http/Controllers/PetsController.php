<?php

namespace App\Http\Controllers;

use App\Constants\PetSpecies;
use App\Constants\PetStatus;
use App\Services\PetService;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Pet;

class PetsController extends Controller
{
    public function __construct(protected PetService $petService)
    {
    }

    public function getPets(Request $request)
    {
        return $this->petService->getAllPets();
    }

    public function getPetById(Request $request, string $pet_id)
    {
        $request->validate([
            'pet_id' => ['required', 'integer']
        ]);

        return $this->petService->getPetById($request->input('pet_id'));
    }

    public function createPet(Request $request)
    {
        $request->validate([
            Pet::NAME => ['required', 'string'],
            Pet::DESCRIPTION => ['string'],
            Pet::STATUS => ['required', Rule::enum(PetStatus::class)],
            Pet::SPECIES => ['required', Rule::enum(PetSpecies::class)],
            Pet::AGE => ['integer', 'gt:0'],
            Pet::BREED => ['string'],
        ]);

        // Filter out any extra properties on the request
        $attributes = $request->only([
            Pet::NAME,
            Pet::DESCRIPTION,
            Pet::STATUS,
            Pet::SPECIES,
            Pet::AGE,
            Pet::BREED
        ]);

        return $this->petService->createPet($attributes);
    }

    public function updatePet(Request $request, int $pet_id)
    {
        $request->validate([
            'pet_id' => ['required', 'integer'],
            Pet::NAME => ['string'],
            Pet::DESCRIPTION => ['string'],
            Pet::STATUS => [Rule::enum(PetStatus::class)],
            Pet::SPECIES => [Rule::enum(PetSpecies::class)],
            Pet::AGE => ['integer', 'gt:0'],
            Pet::BREED => ['string'],
        ]);

        // Filter out any extra properties on the request
        $attributes = $request->only([
            Pet::NAME,
            Pet::DESCRIPTION,
            Pet::STATUS,
            Pet::SPECIES,
            Pet::AGE,
            Pet::BREED
        ]);

        return $this->petService->updatePet($request->input('pet_id'), $attributes);
    }


    public function deletePet(Request $request, int $pet_id)
    {
        $request->validate([
            'pet_id' => ['required', 'integer']
        ]);

        $this->petService->deletePet($request->input('pet_id'));
    }
}
