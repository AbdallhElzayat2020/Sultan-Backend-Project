<?php

namespace App\Enums;

use App\Traits\EnumHelpers;

enum OfferPriceType: string
{
    use EnumHelpers;

    case MONTHLY = 'monthly';
    case ANNUAL = 'annual';

    public function label(): string
    {
        return match ($this) {
            self::MONTHLY => __('dashboard.monthly'),
            self::ANNUAL => __('dashboard.annual'),
        };
    }
}
