<?php

namespace App\Enums;

use App\Traits\EnumHelpers;

enum PropertyType: string
{
    use EnumHelpers;

    case VILLA = 'villa';
    case APARTMENT = 'apartment';
    case EARTH = 'earth';
    case EARTH2 = 'earth2';

//    public const EARTH = 'earth';
//    public const EARTH2 = 'earth2';

    public function label(): string
    {
        return match ($this) {
            self::VILLA => __('dashboard.VILLA'),
            self::APARTMENT => __('dashboard.APARTMENT'),
        };
    }
}
