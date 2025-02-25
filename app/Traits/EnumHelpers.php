<?php

/**
 * Provides helper methods for managing and interacting with PHP Enums.
 */

namespace App\Traits;

trait EnumHelpers
{
    /**
     * Transform the enum to array
     */
    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

    /**
     * Transform the enum to string comma separated
     */
    public static function comment(): string
    {
        $comment = '';
        foreach (self::cases() as $case) {
            $comment .= "{$case->value} => {$case->label()}, ";
        }

        return rtrim($comment, ', ');
    }

    /**
     * Return a label for enum case
     */
    public function label(): string
    {
        return ucwords(strtolower(str_replace('_', ' ', $this->name)));
    }

    /**
     * Compare the current enum instance with another.
     */
    public function is(self $type): bool
    {
        return $this === $type;
    }

    /**
     * Compare the current enum instance with another to see if they're different.
     */
    public function isNot(self $type): bool
    {
        return $this !== $type;
    }

    /**
     * Check if the current enum instance is one of a given list of types.
     */
    public function isOneOf(...$types): bool
    {
        return in_array($this, $types, true);
    }
}
