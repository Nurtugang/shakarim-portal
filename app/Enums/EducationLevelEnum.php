<?php

namespace App\Enums;

enum EducationLevelEnum: string
{
    case BACHELOR = 'bachelor';
    case MASTER = 'master';
    case DOCTORATE = 'doctorate';

    public function label(): string
    {
        return match ($this) {
            self::BACHELOR => __('Бакалавриат'),
            self::MASTER => __('Магистратура'),
            self::DOCTORATE => __('Докторантура'),
        };
    }

    public static function toArray(): array
    {
        return array_column(self::cases(), 'value');
    }
}
