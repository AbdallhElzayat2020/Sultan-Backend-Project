<?php

namespace App\Enums;

use App\Traits\EnumHelpers;

enum OpportunityType: string
{
    use EnumHelpers;

    case EMPLOYMENT = 'employment';
    case TRAINING = 'training';

    public function label(): string
    {
        return match ($this) {
            self::EMPLOYMENT => __('dashboard.EMPLOYMENT'),
            self::TRAINING => __('dashboard.TRAINING'),
        };
    }
}
