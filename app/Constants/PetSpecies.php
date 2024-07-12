<?php

namespace App\Constants;

use App\Helpers\EnumValuesToArray;

enum PetSpecies: string
{
    use EnumValuesToArray;

    case DOG = 'dog';
    case CAT = 'cat';
    case BIRD = 'bird';
    case OTHER = 'other';
}
