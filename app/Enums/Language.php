<?php

namespace App\Enums;

enum Language: string
{
    case UZ = 'uz';
    case RU = 'ru';
    case EN = 'en';

    case UZ_CRYL = 'уз';

    public static function labels(): array
    {
        return [
            self::UZ->value => 'O‘zbekcha',
            self::RU->value => 'Русский',
            self::EN->value => 'English',
            self::UZ_CRYL->value => 'Узбекча',

        ];
    }

    public static function values(): array
    {
        return array_map(fn($case) => $case->value, self::cases());
    }

    
}
