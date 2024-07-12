<?php

namespace App\Helpers;

trait EnumValuesToArray
{
    public static function valuesToArray(): array
    {
        return array_column(self::cases(), 'value');
    }
}
