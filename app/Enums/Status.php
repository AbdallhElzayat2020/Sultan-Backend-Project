<?php

namespace App\Enums;

use App\Traits\EnumHelpers;

enum Status: string
{
    use EnumHelpers;

    case ACTIVE = 'active';
    case INACTIVE = 'inactive';

    public function label(): string
    {
        return match ($this) {
            self::ACTIVE => __('dashboard.status_active'),
            self::INACTIVE => __('dashboard.status_inactive'),
        };
    }

    public function style(): string
    {
        return match ($this) {
            self::ACTIVE => 'bg-label-primary',
            self::INACTIVE => 'bg-label-danger',
        };
    }
}
