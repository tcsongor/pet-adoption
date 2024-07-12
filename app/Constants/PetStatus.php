<?php

namespace App\Constants;

use App\Helpers\EnumValuesToArray;

enum PetStatus: string
{
    use EnumValuesToArray;
    case AVAILABLE = 'available';
    case ADOPTED = 'adopted';
}
