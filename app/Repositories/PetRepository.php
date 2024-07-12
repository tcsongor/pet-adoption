<?php

namespace App\Repositories;

use App\Constants\PetSpecies;
use App\Constants\PetStatus;
use App\Models\Pet;

class PetRepository
{
    /**
     * Retrieve all pets
     * @param ?int If set, only returns pet listings belonging to this user
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAllPets(?int $userId = null)
    {
        if ($userId === null) {
            return Pet::with('user')->get();
        } else {
            return Pet::with('user')->where(Pet::USER_ID, $userId)->get();
        }
    }

    public function getPetById(int $petId)
    {
        return Pet::find($petId);
    }

    public function getAllPetsFiltered(?PetStatus $petStatus = null, ?PetSpecies $species = null)
    {
        $query = Pet::with('user');
        if ($petStatus !== null) {
            $query->where(Pet::STATUS, $petStatus->value);
        }
        if ($species !== null) {
            $query->where(Pet::SPECIES, $species->value);
        }

        return $query->get();
    }

    public function createPet(array $attributes)
    {
        return Pet::factory()->create($attributes);
    }

    public function updatePet(int $petId, array $attributes)
    {
        return Pet::find($petId)->update($attributes);
    }

    public function deletePet(int $petId)
    {
        return Pet::find($petId)->delete();
    }
}