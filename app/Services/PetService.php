<?php

namespace App\Services;

use App\Constants\ErrorMessages;
use App\Repositories\PetRepository;
use App\Constants\PetSpecies;
use App\Constants\PetStatus;

class PetService
{
    public function __construct(protected PetRepository $petRepository)
    {
    }

    public function getAllPets(?int $userId = null)
    {
        return $this->petRepository->getAllPets($userId);
    }

    public function getPetById(int $petId)
    {
        return $this->throwIfPetDoesNotExist($petId);
    }

    public function getAllPetsFiltered(?PetStatus $petStatus = null, ?PetSpecies $species = null)
    {
        return $this->petRepository->getAllPetsFiltered($petStatus, $species);
    }

    public function createPet(array $attributes)
    {
        return $this->petRepository->createPet($attributes);
    }

    public function updatePet(int $petId, array $attributes)
    {
        $this->throwIfPetDoesNotExist($petId);
        $updatedPet = $this->petRepository->updatePet($petId, $attributes);
    }
    public function deletePet(int $petId)
    {
        $this->throwIfPetDoesNotExist($petId);
        return $this->petRepository->deletePet($petId);
    }

    public function throwIfPetDoesNotExist(int $petId)
    {
        $pet = $this->petRepository->getPetById($petId);
        if ($pet === null) {
            abort(404, ErrorMessages::PET_NOT_FOUND);
        }
        return $pet;
    }
}