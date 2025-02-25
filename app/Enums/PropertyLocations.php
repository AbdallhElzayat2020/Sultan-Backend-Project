<?php

namespace App\Enums;

use App\Traits\EnumHelpers;

enum PropertyLocations: string
{
    use EnumHelpers;

    case RIYADH = 'riyadh';
    case JEDDAH = 'jeddah';

    public function label(): string
    {
        return match ($this) {
            self::RIYADH => __('dashboard.RIYADH'),
            self::JEDDAH => __('dashboard.JEDDAH'),
        };
    }
}
