<?php

namespace Database\Seeders;

use App\Constants\PetSpecies;
use App\Constants\PetStatus;
use App\Models\Pet;
use Database\Factories\PetFactory;
use Illuminate\Database\Seeder;

class PetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $testUser = \App\Models\User::first();

        Pet::factory()->create([
            Pet::NAME => 'Rover',
            Pet::DESCRIPTION => 'A good dog',
            PET::SPECIES => PetSpecies::DOG,
            Pet::STATUS => PetStatus::AVAILABLE,
            PET::BREED => 'Mix',
            PET::AGE => 3,
            PET::USER_ID => $testUser->id,
        ]);
    }
}
