<?php

namespace App\Enums;

use App\Traits\EnumHelpers;

enum OfferType: string
{
    use EnumHelpers;

    case RENT = 'rent';
    case SALE = 'sale';

    public function label(): string
    {
        return match ($this) {
            self::RENT => __('dashboard.rent'),
            self::SALE => __('dashboard.sale'),
        };
    }
}
